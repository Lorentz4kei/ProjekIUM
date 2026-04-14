@extends('layouts.tenant')
@section('title', 'Booking Status - e-Kost')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="mb-6 flex justify-between items-center border-b border-gray-200 pb-4">
        <div>
            <h1 class="text-2xl font-bold text-[#012619]">Booking Details</h1>
            <p class="text-gray-500 text-sm mt-1">ID: #BK-9482701</p>
        </div>
        <span class="bg-yellow-100 text-yellow-700 px-4 py-1.5 rounded-full font-bold text-sm">Under Review</span>
    </div>

    <!-- Status Tracker -->
    <div class="bg-white rounded-2xl shadow-md p-6 sm:p-8 mb-8">
        <h2 class="text-lg font-bold text-[#012619] mb-6">Booking Timeline</h2>
        
        <div class="relative relative-step">
            <!-- Line -->
            <div class="absolute left-4 top-2 h-full w-0.5 bg-gray-200 -z-10"></div>
            
            <div class="space-y-6">
                <!-- Step 1 Complete -->
                <div class="flex items-start">
                    <div class="flex-shrink-0 w-8 h-8 rounded-full bg-[#30BF62] flex items-center justify-center border-4 border-white shadow-sm mt-1 ring-2 ring-[#30BF62]">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    </div>
                    <div class="ml-4">
                        <h4 class="text-[#012619] font-bold">Booking Request Created</h4>
                        <p class="text-sm text-gray-500">12 Oct 2026, 14:30</p>
                    </div>
                </div>

                <!-- Step 2 Complete -->
                <div class="flex items-start">
                    <div class="flex-shrink-0 w-8 h-8 rounded-full bg-[#30BF62] flex items-center justify-center border-4 border-white shadow-sm mt-1 ring-2 ring-[#30BF62]">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    </div>
                    <div class="ml-4">
                        <h4 class="text-[#012619] font-bold">DP Payment Submitted</h4>
                        <p class="text-sm text-gray-500">12 Oct 2026, 15:10</p>
                    </div>
                </div>

                <!-- Step 3 Active -->
                <div class="flex items-start">
                    <div class="flex-shrink-0 w-8 h-8 rounded-full bg-yellow-100 flex items-center justify-center border-4 border-white shadow-sm mt-1 ring-2 ring-yellow-400">
                        <span class="w-2.5 h-2.5 bg-yellow-500 rounded-full animate-pulse"></span>
                    </div>
                    <div class="ml-4">
                        <h4 class="text-[#012619] font-bold">Admin Verification</h4>
                        <p class="text-sm text-gray-500">Estimated within 24 hours</p>
                        <p class="text-sm text-yellow-700 bg-yellow-50 p-2 rounded-lg mt-2 inline-block border border-yellow-100">Please wait while our team verifies your ID & payment.</p>
                    </div>
                </div>

                <!-- Step 4 Pending -->
                <div class="flex items-start">
                    <div class="flex-shrink-0 w-8 h-8 rounded-full bg-white border-2 border-gray-300 flex items-center justify-center mt-1">
                    </div>
                    <div class="ml-4">
                        <h4 class="text-gray-400 font-medium">Room Assigned / Active</h4>
                        <p class="text-sm text-gray-400">Not yet reached</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
