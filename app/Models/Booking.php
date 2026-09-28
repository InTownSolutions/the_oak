<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'enquiry_id',
        'customer_name',
        'phone',
        'email',
        'services',
        'details',
        'banquet_event_date',
        'banquet_hall',
        'status',
        'total_amount',
        'advance_amount',
        'payment_status',
        'admin_notes',
    ];

    protected $casts = [
        'services' => 'array',
        'details' => 'array',
        'banquet_event_date' => 'date',
        'total_amount' => 'decimal:2',
        'advance_amount' => 'decimal:2',
    ];

    public function enquiry(): BelongsTo
    {
        return $this->belongsTo(Enquiry::class);
    }
}
