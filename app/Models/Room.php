<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
    'room_number',
    'type',
    'price',
    'status',
    'description',
    'photo',
    'facilities',
];

protected $casts = [
    'facilities' => 'array',
];

// Relasi ke Tenant
public function tenants()
{
    return $this->hasMany(Tenant::class);
}

// Relasi ke Tenant aktif
public function activeTenant()
{
    return $this->hasOne(Tenant::class)->where('status', 'active');
}
}