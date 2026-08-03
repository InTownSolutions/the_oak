<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Enquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'phone',
        'email',
        'service',
        'enquiry_type',
        'guests',
        'preferred_date',
        'status',
        'details',
        'message',
        'admin_notes',
        'next_follow_up',
    ];

    protected $casts = [
        'details' => 'array',
        'preferred_date' => 'date',
        'next_follow_up' => 'date',
    ];

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }
}
