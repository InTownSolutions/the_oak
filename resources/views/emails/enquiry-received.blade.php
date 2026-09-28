<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Enquiry Received</title>
</head>
<body style="margin:0;background:#f8eddb;color:#2b1b12;font-family:Arial,sans-serif;">
    <div style="max-width:680px;margin:0 auto;padding:28px 18px;">
        <div style="background:#fffaf0;border:1px solid #dec58d;padding:28px;">
            <p style="margin:0 0 8px;color:#9b6a05;font-size:12px;font-weight:700;letter-spacing:.08em;text-transform:uppercase;">The Oak Shillong</p>
            <h1 style="margin:0;color:#835500;font-family:Georgia,serif;font-size:32px;font-weight:400;">We received your enquiry</h1>

            <p style="margin:18px 0 0;line-height:1.7;">
                Dear {{ $enquiry->customer_name }},
            </p>
            <p style="margin:10px 0 0;line-height:1.7;">
                Thank you for contacting The Oak Shillong. Your enquiry has been received and our team will call you to confirm the details.
            </p>

            <div style="margin:24px 0;padding:18px;background:#fff4dd;border:1px solid #e3c784;">
                <p style="margin:0 0 10px;font-weight:700;">Enquiry Details</p>
                <p style="margin:6px 0;"><strong>Service:</strong> {{ $enquiry->service }}</p>
                <p style="margin:6px 0;"><strong>Type:</strong> {{ $enquiry->enquiry_type ?: 'General Enquiry' }}</p>
                <p style="margin:6px 0;"><strong>Phone:</strong> {{ $enquiry->phone }}</p>
                @if ($enquiry->preferred_date)
                    <p style="margin:6px 0;"><strong>Preferred Date:</strong> {{ $enquiry->preferred_date->format('d M Y') }}</p>
                @endif
                @if ($enquiry->guests)
                    <p style="margin:6px 0;"><strong>Guests:</strong> {{ $enquiry->guests }}</p>
                @endif
                @if ($enquiry->message)
                    <p style="margin:12px 0 0;"><strong>Message:</strong></p>
                    <p style="margin:6px 0 0;line-height:1.6;">{{ $enquiry->message }}</p>
                @endif
            </div>

            <p style="margin:0;line-height:1.7;">
                This is not a confirmed booking yet. Final confirmation will be done by The Oak team after availability, details, and advance payment are verified.
            </p>

            <p style="margin:24px 0 0;line-height:1.7;">
                Regards,<br>
                <strong>The Oak Shillong</strong>
            </p>
        </div>
    </div>
</body>
</html>
