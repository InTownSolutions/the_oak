<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Enquiry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index(): View
    {
        $enquiries = Enquiry::query()->latest()->get();
        $allBookings = Booking::query()->latest()->get();
        $bookings = $allBookings->take(8);
        $adminRows = $enquiries
            ->map(fn (Enquiry $enquiry): array => [
                'kind' => 'enquiry',
                'id' => $enquiry->id,
                'record_key' => 'enquiry-'.$enquiry->id,
                'customer_name' => $enquiry->customer_name,
                'email' => $enquiry->email,
                'service' => $enquiry->service,
                'type' => $enquiry->enquiry_type ?: 'General Enquiry',
                'phone' => $enquiry->phone,
                'status' => $enquiry->status,
                'created_at' => $enquiry->created_at,
            ])
            ->merge($allBookings->map(fn (Booking $booking): array => [
                'kind' => 'booking',
                'id' => $booking->id,
                'record_key' => 'booking-'.$booking->id,
                'customer_name' => $booking->customer_name,
                'email' => $booking->email,
                'service' => collect($booking->services)->map(fn ($service) => str($service)->headline()->toString())->implode(', '),
                'type' => $booking->enquiry_id ? 'Booking From Enquiry' : 'Manual Booking',
                'phone' => $booking->phone,
                'status' => $booking->status,
                'created_at' => $booking->created_at,
            ]))
            ->sortByDesc('created_at')
            ->values();
        $recordPayloads = $enquiries
            ->mapWithKeys(fn (Enquiry $enquiry): array => [
                'enquiry-'.$enquiry->id => [
                    'kind' => 'enquiry',
                    'id' => $enquiry->id,
                    'customer' => $enquiry->customer_name,
                    'phone' => $enquiry->phone,
                    'email' => $enquiry->email ?: 'No email shared',
                    'service' => $enquiry->service,
                    'type' => $enquiry->enquiry_type ?: 'General Enquiry',
                    'guests' => $enquiry->guests ?: 'Not shared',
                    'preferredDate' => optional($enquiry->preferred_date)->format('Y-m-d') ?: 'Not shared',
                    'created' => $enquiry->created_at->format('d M Y'),
                    'message' => $enquiry->message ?: 'No message shared.',
                    'status' => $enquiry->status,
                    'nextFollowUp' => optional($enquiry->next_follow_up)->format('Y-m-d'),
                    'adminNotes' => $enquiry->admin_notes,
                    'details' => $enquiry->details ?: [],
                ],
            ])
            ->merge($allBookings->mapWithKeys(fn (Booking $booking): array => [
                'booking-'.$booking->id => [
                    'kind' => 'booking',
                    'id' => $booking->id,
                    'customer' => $booking->customer_name,
                    'phone' => $booking->phone,
                    'email' => $booking->email ?: 'No email saved',
                    'service' => collect($booking->services)->map(fn ($service) => str($service)->headline()->toString())->implode(', '),
                    'type' => $booking->enquiry_id ? 'Booking From Enquiry' : 'Manual Booking',
                    'guests' => $this->bookingGuestSummary($booking),
                    'preferredDate' => $this->bookingDateSummary($booking),
                    'created' => $booking->created_at->format('d M Y'),
                    'message' => $this->bookingSummary($booking),
                    'status' => $booking->status,
                    'nextFollowUp' => null,
                    'adminNotes' => $booking->admin_notes,
                    'details' => [
                        ...($booking->details ?: []),
                        'selected_services' => $booking->services ?: [],
                        'estimated_total' => $booking->total_amount,
                        'estimated_advance' => $booking->advance_amount,
                    ],
                ],
            ]));

        return view('admin', [
            'enquiries' => $enquiries,
            'bookings' => $bookings,
            'adminRows' => $adminRows,
            'recordPayloads' => $recordPayloads,
            'stats' => [
                'new' => Enquiry::query()->where('status', 'New')->count(),
                'contacted' => Enquiry::query()->where('status', 'Contacted')->count(),
                'discussion' => Enquiry::query()->where('status', 'In Discussion')->count(),
                'booked' => Enquiry::query()->where('status', 'Booked')->count(),
            ],
        ]);
    }

    public function updateEnquiry(Request $request, Enquiry $enquiry): RedirectResponse
    {
        $validated = $request->validate([
            'status' => ['required', Rule::in(['New', 'Contacted', 'In Discussion', 'Booked', 'Closed'])],
            'next_follow_up' => ['nullable', 'date'],
            'admin_notes' => ['nullable', 'string', 'max:2000'],
        ]);

        $enquiry->update($validated);

        return back()->with('success', 'Enquiry follow-up updated.');
    }

    public function storeBooking(Request $request, Enquiry $enquiry): RedirectResponse
    {
        $validated = $request->validate($this->bookingRules());

        if ($error = $this->bookingConflictMessage($validated)) {
            return back()->withErrors(['booking' => $error]);
        }

        Booking::create([
            'enquiry_id' => $enquiry->id,
            'customer_name' => $enquiry->customer_name,
            'phone' => $enquiry->phone,
            'email' => $enquiry->email,
            'services' => $validated['services'],
            'details' => $validated,
            'banquet_event_date' => $validated['banquet_event_date'] ?? null,
            'banquet_hall' => in_array('banquet', $validated['services'], true) ? ($validated['banquet_hall'] ?? 'Main Banquet Hall') : null,
            'status' => $validated['status'],
            'total_amount' => $validated['total_amount'],
            'advance_amount' => $validated['advance_amount'] ?? null,
            'payment_status' => $validated['payment_status'],
            'admin_notes' => $validated['admin_notes'] ?? null,
        ]);

        if ($validated['status'] === 'Confirmed') {
            $enquiry->update(['status' => 'Booked']);
        }

        return back()->with('success', 'Booking saved for '.$enquiry->customer_name.'.');
    }

    public function storeManualBooking(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'customer_name' => ['required', 'string', 'max:120'],
            'phone' => ['required', 'string', 'max:30'],
            'email' => ['nullable', 'email', 'max:160'],
            ...$this->bookingRules(),
        ]);

        if ($error = $this->bookingConflictMessage($validated)) {
            return back()->withErrors(['booking' => $error]);
        }

        Booking::create([
            'customer_name' => $validated['customer_name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'] ?? null,
            'services' => $validated['services'],
            'details' => $validated,
            'banquet_event_date' => $validated['banquet_event_date'] ?? null,
            'banquet_hall' => in_array('banquet', $validated['services'], true) ? ($validated['banquet_hall'] ?? 'Main Banquet Hall') : null,
            'status' => $validated['status'],
            'total_amount' => $validated['total_amount'],
            'advance_amount' => $validated['advance_amount'] ?? null,
            'payment_status' => $validated['payment_status'],
            'admin_notes' => $validated['admin_notes'] ?? null,
        ]);

        return back()->with('success', 'Manual booking saved for '.$validated['customer_name'].'.');
    }

    private function bookingRules(): array
    {
        return [
            'services' => ['required', 'array', 'min:1'],
            'services.*' => ['string', Rule::in(['banquet', 'rooms', 'decoration', 'catering'])],
            'status' => ['required', Rule::in(['Pending Confirmation', 'Awaiting Advance', 'Advance Received', 'Confirmed', 'Cancelled'])],
            'total_amount' => ['required', 'numeric', 'min:0'],
            'advance_amount' => ['nullable', 'numeric', 'min:0', 'lte:total_amount'],
            'payment_status' => ['required', Rule::in(['Not Collected', 'Advance Requested', 'Advance Received', 'Paid', 'Refunded'])],
            'banquet_event_date' => ['nullable', 'date'],
            'banquet_event_time' => ['nullable', 'date_format:H:i'],
            'banquet_hall' => ['nullable', 'string', 'max:120'],
            'banquet_guests' => ['nullable', 'integer', 'min:1'],
            'rooms_check_in' => ['nullable', 'date'],
            'rooms_check_out' => ['nullable', 'date', 'after_or_equal:rooms_check_in'],
            'room_category' => ['nullable', 'string', 'max:120'],
            'rooms_needed' => ['nullable', 'integer', 'min:1'],
            'decoration_area' => ['nullable', 'string', 'max:120'],
            'decoration_theme' => ['nullable', 'string', 'max:160'],
            'decoration_guests' => ['nullable', 'integer', 'min:1'],
            'food_type' => ['nullable', 'string', 'max:120'],
            'meal_type' => ['nullable', 'string', 'max:120'],
            'menu_style' => ['nullable', 'string', 'max:160'],
            'service_level' => ['nullable', 'string', 'max:120'],
            'catering_guests' => ['nullable', 'integer', 'min:1'],
            'menu_notes' => ['nullable', 'string', 'max:300'],
            'admin_notes' => ['nullable', 'string', 'max:2000'],
        ];
    }

    private function bookingConflictMessage(array $validated): ?string
    {
        if (! in_array('banquet', $validated['services'], true) || $validated['status'] !== 'Confirmed') {
            return null;
        }

        if (empty($validated['banquet_event_date'])) {
            return 'Please select the banquet event date before confirming.';
        }

        $exists = Booking::query()
            ->whereDate('banquet_event_date', $validated['banquet_event_date'])
            ->where('banquet_hall', $validated['banquet_hall'] ?? 'Main Banquet Hall')
            ->where('status', 'Confirmed')
            ->exists();

        return $exists ? 'The selected banquet hall is already booked on this date.' : null;
    }

    private function bookingGuestSummary(Booking $booking): string
    {
        $details = $booking->details ?: [];

        return (string) (
            $details['banquet_guests']
            ?? $details['rooms_needed']
            ?? $details['decoration_guests']
            ?? $details['catering_guests']
            ?? 'Not shared'
        );
    }

    private function bookingDateSummary(Booking $booking): string
    {
        $details = $booking->details ?: [];

        return (string) (
            optional($booking->banquet_event_date)->format('Y-m-d')
            ?? $details['rooms_check_in']
            ?? $details['check_in']
            ?? 'Not shared'
        );
    }

    private function bookingSummary(Booking $booking): string
    {
        $details = $booking->details ?: [];
        $summary = [
            'Booking status: '.$booking->status,
            'Payment status: '.$booking->payment_status,
            'Total cost: '.($booking->total_amount !== null ? 'INR '.number_format((float) $booking->total_amount, 2) : 'Not entered'),
            'Advance amount: '.($booking->advance_amount !== null ? 'INR '.number_format((float) $booking->advance_amount, 2) : 'Not entered'),
        ];

        if (! empty($details['rooms_check_in']) || ! empty($details['rooms_check_out'])) {
            $summary[] = 'Room dates: '.($details['rooms_check_in'] ?? 'Not set').' to '.($details['rooms_check_out'] ?? 'Not set');
        }

        if (! empty($details['banquet_event_time'])) {
            $summary[] = 'Event time: '.$details['banquet_event_time'];
        }

        if (! empty($booking->admin_notes)) {
            $summary[] = 'Notes: '.$booking->admin_notes;
        }

        return implode("\n", $summary);
    }
}
