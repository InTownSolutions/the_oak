<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Enquiry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;

class EnquiryController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'service' => ['required', Rule::in(['Banquet Hall', 'Rooms', 'Decoration', 'Catering', 'Combined Enquiry'])],
            'name' => ['required', 'string', 'max:120'],
            'phone' => ['required', 'string', 'max:30'],
            'email' => ['nullable', 'email', 'max:160'],
            'guests' => ['nullable', 'integer', 'min:1'],
            'message' => ['nullable', 'string', 'max:2000'],
            'event_date' => ['nullable', 'date'],
            'event_type' => ['nullable', 'string', 'max:120'],
            'selected_services' => ['nullable', 'array'],
            'selected_services.*' => ['string', 'max:60'],
        ]);

        if ($validated['service'] === 'Banquet Hall') {
            $request->validate([
                'event_date' => ['required', 'date', function (string $attribute, mixed $value, \Closure $fail): void {
                    if ($this->banquetDateIsBooked($value)) {
                        $fail('The banquet hall is unavailable on this date. Please choose another date.');
                    }
                }],
            ]);
        }

        $details = Arr::except($request->input(), ['_token', 'name', 'phone', 'email', 'service', 'guests', 'message']);
        $selectedServices = $request->input('selected_services', []);

        Enquiry::create([
            'customer_name' => $validated['name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'] ?? null,
            'service' => $validated['service'],
            'enquiry_type' => $this->enquiryType($request),
            'guests' => $validated['guests'] ?? $this->firstNumeric($request, ['banquet_guests', 'rooms_guests', 'decor_guests', 'catering_guests']),
            'preferred_date' => $request->input('event_date'),
            'details' => [
                ...$details,
                'selected_services' => $selectedServices,
            ],
            'message' => $validated['message'] ?? null,
        ]);

        return back()->with('success', 'Your enquiry has been sent. The Oak team will call you back soon.');
    }

    public function banquetAvailability(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'date' => ['required', 'date'],
        ]);

        return response()->json([
            'available' => ! $this->banquetDateIsBooked($validated['date']),
        ]);
    }

    private function banquetDateIsBooked(string $date, string $hall = 'Main Banquet Hall'): bool
    {
        return Booking::query()
            ->whereDate('banquet_event_date', $date)
            ->where('banquet_hall', $hall)
            ->whereIn('status', ['Confirmed', 'Tentative'])
            ->exists();
    }

    private function enquiryType(Request $request): ?string
    {
        return $request->input('event_type')
            ?? $request->input('room_type')
            ?? $request->input('decor_category')
            ?? $request->input('service_level')
            ?? collect($request->input('selected_services', []))->implode(', ');
    }

    private function firstNumeric(Request $request, array $keys): ?int
    {
        foreach ($keys as $key) {
            if (is_numeric($request->input($key))) {
                return (int) $request->input($key);
            }
        }

        return null;
    }
}
