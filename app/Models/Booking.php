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
        'services',
        'details',
        'banquet_event_date',
        'banquet_hall',
        'status',
        'admin_notes',
    ];

    protected $casts = [
        'services' => 'array',
        'details' => 'array',
        'banquet_event_date' => 'date',
    ];

    public function enquiry(): BelongsTo
    {
        return $this->belongsTo(Enquiry::class);
    }
}
