@extends('layouts.app')
@section('title', 'Tenant Details - e-Kost')
@section('header_title', 'Tenant Details')

@section('content')
<div class="mb-4">
    <a href="{{ route('tenants.index') }}" class="text-sm font-medium text-gray-500 hover:text-[#012619] inline-flex items-center">
        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg> Back to Tenants
    </a>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Left Column: Profile Card -->
    <div class="lg:col-span-1 space-y-6">
        <div class="bg-white rounded-2xl shadow-md p-6 text-center text-[#012619]">
            <div class="mx-auto w-24 h-24 rounded-full bg-green-100 text-[#188C4A] text-2xl font-bold flex items-center justify-center mb-4 border-4 border-white shadow-sm ring-2 ring-gray-100">
                JS
            </div>
            <h2 class="text-xl font-bold">John Smith</h2>
            <p class="text-gray-500 text-sm mb-4">john.smith@example.com</p>
            <span class="bg-green-100 text-[#188C4A] px-3 py-1 rounded-full text-xs font-semibold">Active Tenant</span>

            <div class="flex border-t border-gray-100 pt-4 mt-6">
                <div class="w-1/2 p-2 border-r border-gray-100">
                    <p class="text-xs text-gray-500">Room</p>
                    <p class="font-bold text-lg text-[#30BF62]">101</p>
                </div>
                <div class="w-1/2 p-2 relative">
                    <p class="text-xs text-gray-500">Since</p>
                    <p class="font-bold text-sm text-[#012619]">Jan 2026</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-md p-6">
            <h3 class="font-bold text-[#012619] mb-4 border-b border-gray-100 pb-2">Document Proof</h3>
            <img src="https://placehold.co/300x180/e2e8f0/475569?text=KTP+Photo" alt="KTP" class="w-full rounded-xl cursor-pointer hover:opacity-80 transition object-cover border border-gray-200">
            <a href="{{ route('tenants.contract') }}" target="_blank" class="block text-center mt-4 border border-[#035949] text-[#035949] hover:bg-[#035949] hover:text-white rounded-xl px-4 py-2 text-sm font-medium transition duration-200 w-full">View Contract PDF</a>
        </div>
    </div>

    <!-- Right Column: Info & History -->
    <div class="lg:col-span-2 space-y-6">
        <div class="bg-white rounded-2xl shadow-md p-6">
            <div class="flex justify-between items-center mb-6 pb-2 border-b border-gray-100">
                <h3 class="font-bold text-[#012619] text-lg">Personal Information</h3>
                <a href="{{ route('tenants.edit', 1) }}" class="text-sm font-medium text-[#188C4A] hover:text-[#035949] transition">Edit</a>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-6 gap-x-12">
                <div>
                    <span class="text-sm text-gray-500 block mb-1">Full Name</span>
                    <span class="font-medium text-gray-900">John Smith</span>
                </div>
                <div>
                    <span class="text-sm text-gray-500 block mb-1">Phone Number</span>
                    <span class="font-medium text-gray-900">+62 812 3456 7890</span>
                </div>
                <div>
                    <span class="text-sm text-gray-500 block mb-1">ID (NIK) / Passport</span>
                    <span class="font-medium text-gray-900">32710123456789</span>
                </div>
                <div>
                    <span class="text-sm text-gray-500 block mb-1">Emergency Contact</span>
                    <span class="font-medium text-gray-900">+62 811 9988 7766 (Mother)</span>
                </div>
                <div>
                    <span class="text-sm text-gray-500 block mb-1">Contract Start Date</span>
                    <span class="font-medium text-gray-900">10 Jan 2026</span>
                </div>
                <div>
                    <span class="text-sm text-gray-500 block mb-1">Contract End Date</span>
                    <span class="font-medium text-gray-900">10 Jan 2027</span>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-md p-6">
            <h3 class="font-bold text-[#012619] text-lg mb-6 pb-2 border-b border-gray-100">Payment History Timeline</h3>
            
            <div class="relative relative-step pl-4 border-l-2 border-gray-200 space-y-6 ml-2">
                
                <div class="relative">
                    <span class="absolute -left-[25px] bg-[#30BF62] w-3 h-3 rounded-full ring-4 ring-green-100"></span>
                    <h4 class="font-bold text-[#012619] text-sm">March Rent Paid</h4>
                    <p class="text-xs text-green-600 font-medium my-0.5">Rp 1,500,000</p>
                    <span class="text-xs text-gray-400">05 Mar 2026 • via Transfer</span>
                </div>

                <div class="relative">
                    <span class="absolute -left-[25px] bg-[#30BF62] w-3 h-3 rounded-full ring-4 ring-green-100"></span>
                    <h4 class="font-bold text-[#012619] text-sm">February Rent Paid</h4>
                    <p class="text-xs text-green-600 font-medium my-0.5">Rp 1,500,000</p>
                    <span class="text-xs text-gray-400">03 Feb 2026 • via QRIS</span>
                </div>

                <div class="relative">
                    <span class="absolute -left-[25px] bg-gray-400 w-3 h-3 rounded-full ring-4 ring-gray-100"></span>
                    <h4 class="font-bold text-gray-600 text-sm">Initial Deposit + First Month</h4>
                    <p class="text-xs text-gray-500 font-medium my-0.5">Rp 3,000,000</p>
                    <span class="text-xs text-gray-400">10 Jan 2026 • Verified Admin</span>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
