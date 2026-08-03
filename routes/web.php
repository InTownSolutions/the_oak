<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EnquiryController;

function oak_pdf_text(string $text): string
{
    return str_replace(['\\', '(', ')'], ['\\\\', '\\(', '\\)'], $text);
}

function oak_simple_pdf(array $lines): string
{
    $stream = "BT\n/F1 20 Tf\n72 760 Td\n";

    foreach ($lines as $index => $line) {
        if ($index > 0) {
            $stream .= "0 -24 Td\n";
        }

        $stream .= '('.oak_pdf_text($line).") Tj\n";
    }

    $stream .= "ET\n";
    $objects = [
        '1 0 obj << /Type /Catalog /Pages 2 0 R >> endobj',
        '2 0 obj << /Type /Pages /Kids [3 0 R] /Count 1 >> endobj',
        '3 0 obj << /Type /Page /Parent 2 0 R /MediaBox [0 0 612 792] /Resources << /Font << /F1 4 0 R >> >> /Contents 5 0 R >> endobj',
        '4 0 obj << /Type /Font /Subtype /Type1 /BaseFont /Helvetica >> endobj',
        '5 0 obj << /Length '.strlen($stream)." >> stream\n".$stream.'endstream endobj',
    ];

    $pdf = "%PDF-1.4\n";
    $offsets = [0];

    foreach ($objects as $object) {
        $offsets[] = strlen($pdf);
        $pdf .= $object."\n";
    }

    $xref = strlen($pdf);
    $pdf .= "xref\n0 ".count($offsets)."\n0000000000 65535 f \n";

    for ($i = 1; $i < count($offsets); $i++) {
        $pdf .= sprintf("%010d 00000 n \n", $offsets[$i]);
    }

    $pdf .= "trailer << /Size ".count($offsets)." /Root 1 0 R >>\nstartxref\n".$xref."\n%%EOF";

    return $pdf;
}

Route::get('/', function () {
    return view('booking-index');
});

Route::get('/banquet-hall', function () {
    return view('banquet-hall');
})->name('banquet-hall');

Route::get('/rooms', function () {
    return view('rooms');
})->name('rooms');

Route::get('/decoration', function () {
    return view('decoration');
})->name('decoration');

Route::get('/catering', function () {
    return view('catering');
})->name('catering');

Route::get('/combined-enquiry', function () {
    return view('combined-enquiry');
})->name('combined-enquiry');

Route::get('/catering-menu.pdf', function () {
    $pdf = oak_simple_pdf([
        'The Oak - Sample Catering Menu',
        'Vegetarian Complete Feast',
        'Welcome Drink, Paneer Starter, Veg Cutlet, Rice, Bread, Dal, Seasonal Curry, Dessert',
        'Vegetarian Lite Service',
        'Welcome Drink, Two Starters, Rice or Bread, One Main Curry, Dessert',
        'Non-Veg Complete Feast',
        'Welcome Drink, Chicken Starter, Fish Fry, Rice, Bread, Chicken Curry, Veg Side, Dessert',
        'Non-Veg Lite Service',
        'Welcome Drink, One Non-Veg Starter, Rice or Bread, One Non-Veg Main, Dessert',
        'Note: Final menu items will be confirmed by the resort team.',
    ]);

    return response($pdf, 200, [
        'Content-Type' => 'application/pdf',
        'Content-Disposition' => 'inline; filename="the-oak-catering-menu.pdf"',
    ]);
})->name('catering.menu');

Route::post('/enquiries', [EnquiryController::class, 'store'])->name('enquiries.store');
Route::get('/banquet-hall/availability', [EnquiryController::class, 'banquetAvailability'])->name('banquet.availability');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
Route::patch('/admin/enquiries/{enquiry}', [AdminController::class, 'updateEnquiry'])->name('admin.enquiries.update');
Route::post('/admin/enquiries/{enquiry}/bookings', [AdminController::class, 'storeBooking'])->name('admin.bookings.store');
