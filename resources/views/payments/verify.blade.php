@extends('layouts.app')
@section('title', 'Verify Payment - e-Kost')
@section('header_title', 'Verify Payment')

@section('content')
<div class="mb-4">
    <a href="/payments" class="text-sm font-medium text-gray-500 hover:text-[#012619] inline-flex items-center">
        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg> Back
    </a>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
    <!-- Payment Info -->
    <div class="bg-white rounded-2xl shadow-md p-6">
        <div class="flex justify-between items-center mb-6 border-b border-gray-100 pb-4">
            <h2 class="text-xl font-bold text-[#012619]">Action Required</h2>
            <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-bold">Pending Verification</span>
        </div>

        <div class="mb-6 space-y-4 text-gray-700">
            <div>
                <span class="text-sm text-gray-500 block">Tenant Name</span>
                <span class="font-medium text-lg">John Smith</span>
            </div>
            <div>
                <span class="text-sm text-gray-500 block">Room</span>
                <span class="font-medium">Room 101</span>
            </div>
            <div>
                <span class="text-sm text-gray-500 block">Reported Amount</span>
                <span class="font-extrabold text-[#30BF62] text-xl">Rp 1,500,000</span>
            </div>
            <div>
                <span class="text-sm text-gray-500 block">Expected Due</span>
                <span class="font-medium">Rp 1,500,000</span>
            </div>
            <div>
                <span class="text-sm text-gray-500 block">Transfer Date</span>
                <span class="font-medium">10 Mar 2026</span>
            </div>
        </div>

        <div class="pt-6 border-t border-gray-100 space-y-4">
            <button class="w-full bg-[#30BF62] text-white hover:bg-[#188C4A] px-4 py-3 rounded-xl font-bold transition duration-200">
                Approve Payment
            </button>
            <button class="w-full bg-red-50 text-red-600 hover:bg-red-600 hover:text-white border border-red-200 px-4 py-3 rounded-xl font-bold transition duration-200">
                Reject (Proof Invalid)
            </button>
        </div>
    </div>

    <!-- Proof Image Right -->
    <div class="bg-[#F2F2F2] rounded-2xl p-4 flex flex-col justify-center items-center h-full min-h-[500px]">
        <h3 class="text-sm font-medium text-gray-500 mb-4 w-full text-left">Attached Proof</h3>
        <img src="https://placehold.co/400x500/e2e8f0/475569?text=M-Banking+Transfer+Proof" class="rounded-xl shadow-md max-w-full h-auto object-contain bg-white">
    </div>
</div>
@endsection
