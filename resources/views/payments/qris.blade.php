@extends('layouts.guest')
@section('title', 'QRIS Payment - e-Kost')

@section('content')
<div class="min-h-[calc(100vh-64px)] flex items-center justify-center bg-[#F2F2F2] py-12 px-4">
    <div class="max-w-sm w-full bg-white rounded-3xl shadow-xl p-8 text-center relative overflow-hidden ring-1 ring-gray-100">
        
        <!-- Header -->
        <div class="mb-6">
            <img src="https://placehold.co/100x40/FFFFFF/000000?text=QRIS" alt="QRIS Logo" class="mx-auto h-8 mb-4">
            <h2 class="text-xl font-bold text-[#012619]">e-Kost Management</h2>
            <p class="text-gray-500 text-sm">NMID: ID1029384756</p>
        </div>

        <!-- QR Box -->
        <div class="bg-white p-4 rounded-2xl shadow-inner border border-gray-200 mb-6 inline-block">
            <img src="https://placehold.co/250x250/000000/FFFFFF?text=QR+Code" alt="QR Code" class="w-48 h-48 sm:w-56 sm:h-56">
        </div>

        <!-- Amount -->
        <div class="mb-6">
            <p class="text-gray-500 text-sm mb-1">Amount to pay</p>
            <p class="text-3xl font-extrabold text-[#30BF62]">Rp 1,500,000</p>
        </div>

        <!-- Buttons -->
        <div class="flex flex-col space-y-3">
            <button class="bg-[#035949] text-white py-3 rounded-xl font-medium hover:bg-[#012619] transition flex items-center justify-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" /></svg>
                Download QR Code
            </button>
            <button onclick="window.history.back()" class="bg-gray-100 text-gray-700 py-3 rounded-xl font-medium hover:bg-gray-200 transition">
                I have paid, back to upload
            </button>
        </div>
        
    </div>
</div>
@endsection
