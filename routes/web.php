<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EnquiryController;

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

Route::post('/enquiries', [EnquiryController::class, 'store'])->name('enquiries.store');
Route::get('/banquet-hall/availability', [EnquiryController::class, 'banquetAvailability'])->name('banquet.availability');
Route::get('/rooms/availability', [EnquiryController::class, 'roomAvailability'])->name('rooms.availability');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
Route::patch('/admin/enquiries/{enquiry}', [AdminController::class, 'updateEnquiry'])->name('admin.enquiries.update');
Route::post('/admin/enquiries/{enquiry}/bookings', [AdminController::class, 'storeBooking'])->name('admin.bookings.store');
Route::post('/admin/bookings', [AdminController::class, 'storeManualBooking'])->name('admin.bookings.manual-store');
