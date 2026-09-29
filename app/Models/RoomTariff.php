<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomTariff extends Model
{
    use HasFactory;

    protected $fillable = [
        'rule_name',
        'room_category',
        'starts_on',
        'ends_on',
        'tariff_type',
        'price_per_night',
        'note',
        'is_active',
    ];

    protected $casts = [
        'starts_on' => 'date',
        'ends_on' => 'date',
        'price_per_night' => 'decimal:2',
        'is_active' => 'boolean',
    ];
}
