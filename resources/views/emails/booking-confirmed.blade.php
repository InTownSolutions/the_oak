<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Booking Confirmed</title>
</head>
<body style="margin:0;background:#f8eddb;color:#2b1b12;font-family:Arial,sans-serif;">
    @php
        $details = $booking->details ?: [];
        $services = collect($booking->services)->map(fn ($service) => \Illuminate\Support\Str::headline($service))->implode(', ');
    @endphp
    <div style="max-width:680px;margin:0 auto;padding:28px 18px;">
        <div style="background:#fffaf0;border:1px solid #dec58d;padding:28px;">
            <p style="margin:0 0 8px;color:#9b6a05;font-size:12px;font-weight:700;letter-spacing:.08em;text-transform:uppercase;">The Oak Shillong</p>
            <h1 style="margin:0;color:#835500;font-family:Georgia,serif;font-size:32px;font-weight:400;">Your booking is confirmed</h1>

            <p style="margin:18px 0 0;line-height:1.7;">
                Dear {{ $booking->customer_name }},
            </p>
            <p style="margin:10px 0 0;line-height:1.7;">
                Your booking with The Oak Shillong has been confirmed. Please find the booking summary below.
            </p>

            <div style="margin:24px 0;padding:18px;background:#fff4dd;border:1px solid #e3c784;">
                <p style="margin:0 0 10px;font-weight:700;">Booking Details</p>
                <p style="margin:6px 0;"><strong>Booking ID:</strong> BK-{{ str_pad((string) $booking->id, 4, '0', STR_PAD_LEFT) }}</p>
                <p style="margin:6px 0;"><strong>Services:</strong> {{ $services }}</p>
                <p style="margin:6px 0;"><strong>Status:</strong> {{ $booking->status }}</p>
                <p style="margin:6px 0;"><strong>Payment Status:</strong> {{ $booking->payment_status }}</p>
                <p style="margin:6px 0;"><strong>Total Cost:</strong> INR {{ number_format((float) $booking->total_amount, 2) }}</p>
                @if ($booking->advance_amount !== null)
                    <p style="margin:6px 0;"><strong>Advance Amount:</strong> INR {{ number_format((float) $booking->advance_amount, 2) }}</p>
                @endif
                @if ($booking->banquet_event_date)
                    <p style="margin:6px 0;"><strong>Banquet Date:</strong> {{ $booking->banquet_event_date->format('d M Y') }}</p>
                @endif
                @if (! empty($details['rooms_check_in']) || ! empty($details['rooms_check_out']))
                    <p style="margin:6px 0;"><strong>Room Dates:</strong> {{ $details['rooms_check_in'] ?? 'Not set' }} to {{ $details['rooms_check_out'] ?? 'Not set' }}</p>
                @endif
                @if (! empty($details['banquet_event_time']))
                    <p style="margin:6px 0;"><strong>Event Time:</strong> {{ $details['banquet_event_time'] }}</p>
                @endif
                @if ($booking->admin_notes)
                    <p style="margin:12px 0 0;"><strong>Notes:</strong></p>
                    <p style="margin:6px 0 0;line-height:1.6;">{{ $booking->admin_notes }}</p>
                @endif
            </div>

            <p style="margin:0;line-height:1.7;">
                If any detail above needs correction, please contact The Oak team immediately.
            </p>

            <p style="margin:24px 0 0;line-height:1.7;">
                Regards,<br>
                <strong>The Oak Shillong</strong>
            </p>
        </div>
    </div>
</body>
</html>
