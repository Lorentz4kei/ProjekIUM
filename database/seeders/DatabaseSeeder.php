<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Dummy Admin
        User::create([
            'name' => 'Admin e-Kost',
            'email' => 'admin@kos.com',
            'password' => Hash::make('admin123'), // Sesuai dummy di Blade Anda
            'role' => 'admin',
            'phone' => '08123456789',
            'email_verified_at' => now(), // LANGKAH PENTING: Biar bisa langsung login tanpa verifikasi email
        ]);

        // Dummy Tenant (Penyewa)
        User::create([
            'name' => 'Budi Tenant',
            'email' => 'tenant@kos.com',
            'password' => Hash::make('tenant123'),
            'role' => 'tenant',
            'phone' => '08987654321',
            'email_verified_at' => now(), // LANGKAH PENTING
        ]);
    }
}