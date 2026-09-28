<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Enquiry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class EnquiryController extends Controller
{
    private const ROOM_TYPE = 'Guest Room';
    private const ROOM_PRICE_PER_NIGHT = 3500;
    private const ROOM_ADVANCE_PERCENT = 25;
    private const ROOM_TOTAL_INVENTORY = 8;

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
            'food_type' => ['nullable', 'string', 'max:120'],
            'meal_type' => ['nullable', 'string', 'max:120'],
            'menu_style' => ['nullable', 'string', 'max:160'],
            'service_level' => ['nullable', 'string', 'max:120'],
            'selected_services' => ['nullable', 'array'],
            'selected_services.*' => ['string', 'max:60'],
            'check_in' => ['nullable', 'date'],
            'check_out' => ['nullable', 'date', 'after:check_in'],
            'rooms' => ['nullable', 'integer', 'min:1'],
            'room_type' => ['nullable', 'string', 'max:120'],
            'upi_reference' => ['nullable', 'string', 'max:120'],
            'estimated_total' => ['nullable', 'numeric', 'min:0'],
            'estimated_advance' => ['nullable', 'numeric', 'min:0'],
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

        if ($validated['service'] === 'Rooms') {
            $request->validate([
                'check_in' => ['required', 'date'],
                'check_out' => ['required', 'date', 'after:check_in'],
                'rooms' => ['required', 'integer', 'min:1', function (string $attribute, mixed $value, \Closure $fail) use ($request): void {
                    $available = $this->availableRooms(
                        $request->input('check_in'),
                        $request->input('check_out'),
                        $request->input('room_type', self::ROOM_TYPE)
                    );

                    if ((int) $value > $available) {
                        $fail('Only '.$available.' room(s) appear available for the selected dates. Please reduce rooms or choose different dates.');
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
            'preferred_date' => $request->input('event_date') ?? $request->input('check_in'),
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

    public function roomAvailability(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'check_in' => ['required', 'date'],
            'check_out' => ['required', 'date', 'after:check_in'],
            'rooms' => ['nullable', 'integer', 'min:1'],
            'room_type' => ['nullable', 'string', 'max:120'],
        ]);

        $roomsRequested = (int) ($validated['rooms'] ?? 1);
        $available = $this->availableRooms(
            $validated['check_in'],
            $validated['check_out'],
            $validated['room_type'] ?? self::ROOM_TYPE
        );
        $nights = max(1, Carbon::parse($validated['check_in'])->diffInDays(Carbon::parse($validated['check_out'])));
        $total = $roomsRequested * $nights * self::ROOM_PRICE_PER_NIGHT;
        $advance = (int) ceil($total * self::ROOM_ADVANCE_PERCENT / 100);

        return response()->json([
            'available' => $available >= $roomsRequested,
            'available_rooms' => $available,
            'nights' => $nights,
            'price_per_night' => self::ROOM_PRICE_PER_NIGHT,
            'advance_percent' => self::ROOM_ADVANCE_PERCENT,
            'estimated_total' => $total,
            'estimated_advance' => $advance,
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

    private function availableRooms(string $checkIn, string $checkOut, string $roomType = self::ROOM_TYPE): int
    {
        $bookedRooms = Booking::query()
            ->where('status', 'Confirmed')
            ->get()
            ->filter(function (Booking $booking) use ($checkIn, $checkOut, $roomType): bool {
                $details = $booking->details ?? [];
                $services = $booking->services ?? [];

                if (! in_array('rooms', $services, true)) {
                    return false;
                }

                if (($details['room_category'] ?? self::ROOM_TYPE) !== $roomType) {
                    return false;
                }

                $bookingCheckIn = $details['rooms_check_in'] ?? null;
                $bookingCheckOut = $details['rooms_check_out'] ?? null;

                if (! $bookingCheckIn || ! $bookingCheckOut) {
                    return false;
                }

                return $checkIn < $bookingCheckOut && $checkOut > $bookingCheckIn;
            })
            ->sum(fn (Booking $booking): int => (int) (($booking->details['rooms_needed'] ?? 1)));

        return max(0, self::ROOM_TOTAL_INVENTORY - $bookedRooms);
    }

    private function enquiryType(Request $request): ?string
    {
        return $request->input('event_type')
            ?? $request->input('room_type')
            ?? $request->input('decor_area')
            ?? $request->input('theme')
            ?? $request->input('meal_type')
            ?? $request->input('menu_style')
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
