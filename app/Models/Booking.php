<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'room_id',
        'booking_code',
        'duration',
        'start_date',
        'dp_amount',
        'dp_status',
        'midtrans_order_id',
        'snap_token',
        'payment_method',
        'status',
        'notes',
    ];

    protected $casts = [
        'start_date' => 'date',
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Room
    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    // Generate booking code
    public static function generateBookingCode(): string
    {
        $latest = self::latest()->first();
        $number = $latest ? (int) substr($latest->booking_code, -6) + 1 : 1;
        return 'BK-' . str_pad($number, 7, '0', STR_PAD_LEFT);
    }
}