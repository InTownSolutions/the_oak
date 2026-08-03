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
        $bookings = Booking::query()->latest()->take(8)->get();

        return view('admin', [
            'enquiries' => $enquiries,
            'bookings' => $bookings,
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
        $validated = $request->validate([
            'services' => ['required', 'array', 'min:1'],
            'services.*' => ['string', 'max:40'],
            'banquet_event_date' => ['nullable', 'date'],
            'banquet_event_time' => ['nullable', 'date_format:H:i'],
            'banquet_hall' => ['nullable', 'string', 'max:120'],
            'banquet_guests' => ['nullable', 'integer', 'min:1'],
            'rooms_check_in' => ['nullable', 'date'],
            'rooms_check_out' => ['nullable', 'date'],
            'room_category' => ['nullable', 'string', 'max:120'],
            'rooms_needed' => ['nullable', 'integer', 'min:1'],
            'decoration_category' => ['nullable', 'string', 'max:120'],
            'decoration_area' => ['nullable', 'string', 'max:120'],
            'decoration_theme' => ['nullable', 'string', 'max:160'],
            'decoration_guests' => ['nullable', 'integer', 'min:1'],
            'food_type' => ['nullable', 'string', 'max:120'],
            'service_level' => ['nullable', 'string', 'max:120'],
            'catering_guests' => ['nullable', 'integer', 'min:1'],
            'menu_notes' => ['nullable', 'string', 'max:300'],
            'admin_notes' => ['nullable', 'string', 'max:2000'],
        ]);

        $services = $validated['services'];
        $banquetHall = $validated['banquet_hall'] ?? 'Main Banquet Hall';
        $banquetDate = $validated['banquet_event_date'] ?? null;

        if (in_array('banquet', $services, true)) {
            if (! $banquetDate) {
                return back()->withErrors(['booking' => 'Please select the banquet event date before confirming.']);
            }

            $exists = Booking::query()
                ->whereDate('banquet_event_date', $banquetDate)
                ->where('banquet_hall', $banquetHall)
                ->whereIn('status', ['Confirmed', 'Tentative'])
                ->exists();

            if ($exists) {
                return back()->withErrors(['booking' => 'The selected banquet hall is already booked on this date.']);
            }
        }

        Booking::create([
            'enquiry_id' => $enquiry->id,
            'customer_name' => $enquiry->customer_name,
            'phone' => $enquiry->phone,
            'services' => $services,
            'details' => $validated,
            'banquet_event_date' => $banquetDate,
            'banquet_hall' => in_array('banquet', $services, true) ? $banquetHall : null,
            'admin_notes' => $validated['admin_notes'] ?? null,
        ]);

        $enquiry->update(['status' => 'Booked']);

        return back()->with('success', 'Internal booking confirmed for '.$enquiry->customer_name.'.');
    }
}
