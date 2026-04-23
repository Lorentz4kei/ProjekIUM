<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
    'tenant_id',
    'invoice_number',
    'midtrans_order_id',
    'payment_method',
    'snap_token',
    'amount',
    'due_date',
    'transfer_date',
    'sender_name',
    'proof_photo',
    'status',
    'verified_at',
    'verified_by',
    'notes',
];

    protected $casts = [
        'due_date'      => 'date',
        'transfer_date' => 'date',
        'verified_at'   => 'datetime',
    ];

    // Relasi ke Tenant
    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    // Relasi ke User (admin yang verifikasi)
    public function verifiedBy()
    {
        return $this->belongsTo(User::class, 'verified_by');
    }

    // Generate invoice number otomatis
    public static function generateInvoiceNumber(): string
    {
        $latest = self::latest()->first();
        $number = $latest ? (int) substr($latest->invoice_number, -6) + 1 : 1;
        return 'INV-' . date('y') . str_pad($number, 4, '0', STR_PAD_LEFT);
    }
}