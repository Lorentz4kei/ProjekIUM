<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User; // Tambahkan ini untuk hitung Tenant
use App\Models\Room; // Tambahkan ini untuk hitung Kamar
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Logika untuk mengambil statistik dari database
        $stats = [
            'total_tenants' => User::where('role', 'tenant')->count(),
            'total_rooms' => Room::count(),
            'empty_rooms' => Room::where('status', 'available')->count(),
            'new_complaints' => 0, // Sementara 0, nanti kita buat tabel complaints
        ];

        // Mengirimkan data $stats ke file views/dashboard/index.blade.php
        return view('dashboard.index', compact('stats'));
    }
}