@extends('layouts.app')
@section('title', 'Manage Tenant - e-Kost')
@section('header_title', 'Create / Edit Tenant')

@section('content')
<div class="max-w-4xl bg-white rounded-2xl shadow-md p-6 sm:p-8">
    <div class="mb-6 flex items-center justify-between border-b border-gray-100 pb-4">
        <h2 class="text-xl font-bold text-[#012619]">Tenant Form</h2>
        <a href="/tenants" class="text-gray-400 hover:text-gray-600 transition"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg></a>
    </div>

    <form action="#" class="space-y-8">
        @csrf
        
        <!-- Section: Personal Info -->
        <div>
            <h3 class="text-lg font-semibold text-[#035949] mb-4">Personal Information</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                    <input type="text" placeholder="John Doe" class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-[#30BF62] focus:border-[#30BF62]">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                    <input type="email" placeholder="email@ext.com" class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-[#30BF62] focus:border-[#30BF62]">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                    <input type="tel" placeholder="+62..." class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-[#30BF62] focus:border-[#30BF62]">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Identity Card (NIK)</label>
                    <input type="text" placeholder="16 digit NIK" class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-[#30BF62] focus:border-[#30BF62]">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Upload KTP</label>
                    <input type="file" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-[#188C4A] hover:file:bg-green-100 transition">
                </div>
            </div>
        </div>

        <hr class="border-gray-100">

        <!-- Section: Room Assignment -->
        <div>
            <h3 class="text-lg font-semibold text-[#035949] mb-4">Room Assignment & Contract</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Assign Room</label>
                    <select class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-[#30BF62] focus:border-[#30BF62]">
                        <option>Select available room</option>
                        <option>Room 101 (Standard)</option>
                        <option>Room 102 (VIP)</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Stay Duration</label>
                    <select class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-[#30BF62] focus:border-[#30BF62]">
                        <option>1 Month</option>
                        <option>3 Months</option>
                        <option>6 Months</option>
                        <option>12 Months</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Start Date</label>
                    <input type="date" class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-[#30BF62] focus:border-[#30BF62]">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                    <select class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-[#30BF62] focus:border-[#30BF62]">
                        <option>Active</option>
                        <option>Pending Payment</option>
                        <option>Past</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="flex justify-end gap-3 pt-4">
            <button type="button" onclick="window.history.back()" class="border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 rounded-xl px-5 py-2 font-medium transition duration-200">Cancel</button>
            <button type="button" onclick="window.location.href='/tenants'" class="bg-[#30BF62] text-white hover:bg-[#188C4A] rounded-xl px-5 py-2 font-medium transition duration-200 shadow-sm">Save Tenant</button>
        </div>
    </form>
</div>
@endsection
