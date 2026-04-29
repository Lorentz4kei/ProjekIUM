@extends('layouts.tenant')
@section('title', 'Booking Status - e-Kost')

@section('content')
    <div class="max-w-3xl mx-auto">
        <div class="mb-6 flex justify-between items-center border-b border-gray-200 pb-4">
            <div>
                <h1 class="text-2xl font-bold text-[#012619]">Booking Details</h1>
                <p class="text-gray-500 text-sm mt-1">ID: #{{ $booking->booking_code }}</p>
            </div>
            @if($booking->status == 'pending')
                <span class="bg-gray-100 text-gray-600 px-4 py-1.5 rounded-full font-bold text-sm">Pending</span>
            @elseif($booking->status == 'dp_paid')
                <span class="bg-yellow-100 text-yellow-700 px-4 py-1.5 rounded-full font-bold text-sm">Under Review</span>
            @elseif($booking->status == 'approved')
                <span class="bg-green-100 text-[#188C4A] px-4 py-1.5 rounded-full font-bold text-sm">Approved</span>
            @elseif($booking->status == 'rejected')
                <span class="bg-red-100 text-red-600 px-4 py-1.5 rounded-full font-bold text-sm">Rejected</span>
            @endif
        </div>

        <!-- Status Tracker -->
        <div class="bg-white rounded-2xl shadow-md p-6 sm:p-8 mb-8">
            <h2 class="text-lg font-bold text-[#012619] mb-6">Booking Timeline</h2>

            <div class="relative relative-step">
                <!-- Line -->
                <div class="absolute left-4 top-2 h-full w-0.5 bg-gray-200 -z-10"></div>

                <div class="space-y-6">
                <!-- Step 1 - Booking Created -->
                <div class="flex items-start">
                    <div
                        class="flex-shrink-0 w-8 h-8 rounded-full bg-[#30BF62] flex items-center justify-center border-4 border-white shadow-sm mt-1 ring-2 ring-[#30BF62]">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h4 class="text-[#012619] font-bold">Booking Request Created</h4>
                        <p class="text-sm text-gray-500">{{ $booking->created_at->format('d M Y, H:i') }}</p>
                        <p class="text-sm text-gray-500 mt-1">Room {{ $booking->room->room_number }} • {{ $booking->duration }} Month(s)
                        </p>
                    </div>
                </div>

                <!-- Step 2 - DP Payment -->
                <div class="flex items-start">
                    @if(in_array($booking->status, ['dp_paid', 'approved']))
                        <div
                            class="flex-shrink-0 w-8 h-8 rounded-full bg-[#30BF62] flex items-center justify-center border-4 border-white shadow-sm mt-1 ring-2 ring-[#30BF62]">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                    @elseif($booking->status == 'rejected')
                        <div
                            class="flex-shrink-0 w-8 h-8 rounded-full bg-red-100 flex items-center justify-center border-4 border-white shadow-sm mt-1 ring-2 ring-red-400">
                            <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </div>
                    @else
                        <div
                            class="flex-shrink-0 w-8 h-8 rounded-full bg-yellow-100 flex items-center justify-center border-4 border-white shadow-sm mt-1 ring-2 ring-yellow-400">
                            <span class="w-2.5 h-2.5 bg-yellow-500 rounded-full animate-pulse"></span>
                        </div>
                    @endif
                    <div class="ml-4">
                        <h4 class="text-[#012619] font-bold">DP Payment</h4>
                        @if($booking->dp_status == 'paid')
                            <p class="text-sm text-gray-500">Rp {{ number_format($booking->dp_amount, 0, ',', '.') }} • Paid via
                                {{ $booking->payment_method ?? 'Midtrans' }}</p>
                        @else
                            <p class="text-sm text-yellow-600">Waiting for payment...</p>
                            <a href="{{ route('booking.upload-dp', $booking->id) }}"
                                class="text-sm text-[#188C4A] hover:underline mt-1 inline-block">Complete Payment →</a>
                        @endif
                    </div>
                </div>

                <!-- Step 3 - Admin Verification -->
                <div class="flex items-start">
                    @if($booking->status == 'approved')
                        <div
                            class="flex-shrink-0 w-8 h-8 rounded-full bg-[#30BF62] flex items-center justify-center border-4 border-white shadow-sm mt-1 ring-2 ring-[#30BF62]">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                    @elseif($booking->status == 'rejected')
                        <div
                            class="flex-shrink-0 w-8 h-8 rounded-full bg-red-100 flex items-center justify-center border-4 border-white shadow-sm mt-1 ring-2 ring-red-400">
                            <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </div>
                    @elseif($booking->status == 'dp_paid')
                        <div
                            class="flex-shrink-0 w-8 h-8 rounded-full bg-yellow-100 flex items-center justify-center border-4 border-white shadow-sm mt-1 ring-2 ring-yellow-400">
                            <span class="w-2.5 h-2.5 bg-yellow-500 rounded-full animate-pulse"></span>
                        </div>
                    @else
                        <div
                            class="flex-shrink-0 w-8 h-8 rounded-full bg-white border-2 border-gray-300 flex items-center justify-center mt-1">
                        </div>
                    @endif
                    <div class="ml-4">
                        <h4 class="text-[#012619] font-bold">Admin Verification</h4>
                        @if($booking->status == 'approved')
                            <p class="text-sm text-green-600 font-medium">Approved! ✓</p>
                        @elseif($booking->status == 'rejected')
                            <p class="text-sm text-red-500 font-medium">Rejected</p>
                            @if($booking->notes)
                                <p class="text-sm text-red-400 bg-red-50 p-2 rounded-lg mt-2 border border-red-100">{{ $booking->notes }}</p>
                            @endif
                        @elseif($booking->status == 'dp_paid')
                            <p class="text-sm text-gray-500">Estimated within 24 hours</p>
                            <p class="text-sm text-yellow-700 bg-yellow-50 p-2 rounded-lg mt-2 inline-block border border-yellow-100">Please
                                wait while our team reviews your booking.</p>
                        @else
                            <p class="text-sm text-gray-400">Not yet reached</p>
                        @endif
                    </div>
                </div>

                <!-- Step 4 - Room Active -->
                <div class="flex items-start">
                    @if($booking->status == 'approved')
                        <div
                            class="flex-shrink-0 w-8 h-8 rounded-full bg-[#30BF62] flex items-center justify-center border-4 border-white shadow-sm mt-1 ring-2 ring-[#30BF62]">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                    @else
                        <div
                            class="flex-shrink-0 w-8 h-8 rounded-full bg-white border-2 border-gray-300 flex items-center justify-center mt-1">
                        </div>
                    @endif
                    <div class="ml-4">
                        <h4 class="{{ $booking->status == 'approved' ? 'text-[#012619]' : 'text-gray-400' }} font-medium">Room Assigned
                            / Active</h4>
                        @if($booking->status == 'approved')
                            <p class="text-sm text-green-600">Start date: {{ $booking->start_date->format('d M Y') }}</p>
                            <a href="{{ route('payments.my') }}" class="text-sm text-[#188C4A] hover:underline mt-1 inline-block">View
                                Payment →</a>
                        @else
                            <p class="text-sm text-gray-400">Not yet reached</p>
                        @endif
                    </div>
                </div>
                </div>
            </div>
        </div>

    </div>
@endsection
