@extends('layouts.app')
@section('title', 'Booking Detail - e-Kost')
@section('header_title', 'Booking Detail')

@section('content')
    <div class="mb-4">
        <a href="{{ route('admin.bookings.index') }}"
            class="text-sm font-medium text-gray-500 hover:text-[#012619] inline-flex items-center">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Back to Bookings
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- Left: Booking Info --}}
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-2xl shadow-md p-6">
                <div class="flex justify-between items-center mb-6 pb-2 border-b border-gray-100">
                    <h3 class="font-bold text-[#012619] text-lg">Booking Information</h3>
                    @if($booking->status == 'pending')
                        <span class="bg-gray-100 text-gray-600 px-3 py-1 rounded-full text-xs font-bold">Pending</span>
                    @elseif($booking->status == 'dp_paid')
                        <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-bold">DP Paid - Needs
                            Approval</span>
                    @elseif($booking->status == 'approved')
                        <span class="bg-green-100 text-[#188C4A] px-3 py-1 rounded-full text-xs font-bold">Approved</span>
                    @elseif($booking->status == 'rejected')
                        <span class="bg-red-100 text-red-600 px-3 py-1 rounded-full text-xs font-bold">Rejected</span>
                    @endif
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <span class="text-sm text-gray-500 block mb-1">Booking Code</span>
                        <span class="font-medium text-gray-900">#{{ $booking->booking_code }}</span>
                    </div>
                    <div>
                        <span class="text-sm text-gray-500 block mb-1">Tenant Name</span>
                        <span class="font-medium text-gray-900">{{ $booking->user->name }}</span>
                    </div>
                    <div>
                        <span class="text-sm text-gray-500 block mb-1">Email</span>
                        <span class="font-medium text-gray-900">{{ $booking->user->email }}</span>
                    </div>
                    <div>
                        <span class="text-sm text-gray-500 block mb-1">Room</span>
                        <span class="font-medium text-gray-900">Room {{ $booking->room->room_number }}
                            ({{ $booking->room->type }})</span>
                    </div>
                    <div>
                        <span class="text-sm text-gray-500 block mb-1">Duration</span>
                        <span class="font-medium text-gray-900">{{ $booking->duration }} Month(s)</span>
                    </div>
                    <div>
                        <span class="text-sm text-gray-500 block mb-1">Monthly Price</span>
                        <span class="font-medium text-gray-900">Rp
                            {{ number_format($booking->room->price, 0, ',', '.') }}</span>
                    </div>
                    <div>
                        <span class="text-sm text-gray-500 block mb-1">DP Amount (50%)</span>
                        <span class="font-medium text-[#30BF62]">Rp
                            {{ number_format($booking->dp_amount, 0, ',', '.') }}</span>
                    </div>
                    <div>
                        <span class="text-sm text-gray-500 block mb-1">DP Status</span>
                        <span
                            class="font-medium text-gray-900">{{ $booking->dp_status == 'paid' ? '✅ Paid' : '⏳ Pending' }}</span>
                    </div>
                    <div>
                        <span class="text-sm text-gray-500 block mb-1">Requested Start Date</span>
                        <span class="font-medium text-gray-900">{{ $booking->start_date->format('d M Y') }}</span>
                    </div>
                    <div>
                        <span class="text-sm text-gray-500 block mb-1">Payment Method</span>
                        <span class="font-medium text-gray-900">{{ $booking->payment_method ?? '-' }}</span>
                    </div>
                    @if($booking->notes)
                        <div class="sm:col-span-2">
                            <span class="text-sm text-gray-500 block mb-1">Notes</span>
                            <span class="font-medium text-gray-900">{{ $booking->notes }}</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- Right: Actions --}}
        <div class="lg:col-span-1">
            <div class="bg-white rounded-2xl shadow-md p-6 sticky top-24">
                <h3 class="font-bold text-[#012619] mb-4 border-b border-gray-100 pb-2">Admin Actions</h3>

                @if($booking->status == 'dp_paid')
                    {{-- Approve Form --}}
                    <form action="{{ route('admin.bookings.approve', $booking->id) }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Confirm Start Date</label>
                            <input type="date" name="start_date" value="{{ $booking->start_date->format('Y-m-d') }}"
                                class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-[#30BF62] focus:border-[#30BF62]"
                                required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Notes (Optional)</label>
                            <textarea name="notes" rows="2" placeholder="Catatan untuk tenant..."
                                class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-[#30BF62] focus:border-[#30BF62] text-sm"></textarea>
                        </div>
                        <button type="submit"
                            class="w-full bg-[#30BF62] text-white hover:bg-[#188C4A] px-4 py-3 rounded-xl font-bold transition duration-200">
                            Approve & Activate Tenant
                        </button>
                    </form>

                    {{-- Reject Form --}}
                    <form action="{{ route('admin.bookings.reject', $booking->id) }}" method="POST" class="mt-4 space-y-3"
                        x-data="{ open: false }">
                        @csrf
                        <button type="button" @click="open = !open"
                            class="w-full bg-red-50 text-red-600 hover:bg-red-600 hover:text-white border border-red-200 px-4 py-3 rounded-xl font-bold transition duration-200">
                            Reject Booking
                        </button>
                        <div x-show="open" x-transition>
                            <textarea name="notes" rows="2" placeholder="Alasan penolakan..." required
                                class="w-full border border-red-300 rounded-xl px-4 py-2 text-sm focus:ring-red-400 focus:border-red-400"></textarea>
                            <button type="submit"
                                class="w-full mt-2 bg-red-600 text-white hover:bg-red-700 px-4 py-2 rounded-xl font-bold transition duration-200">
                                Confirm Reject
                            </button>
                        </div>
                    </form>

                @elseif($booking->status == 'approved')
                    <div class="text-center py-6">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-3">
                            <svg class="w-8 h-8 text-[#30BF62]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <p class="text-gray-500 text-sm">Booking sudah diapprove dan tenant sudah aktif.</p>
                        <a href="{{ route('tenants.index') }}"
                            class="mt-3 inline-block text-[#188C4A] hover:underline text-sm font-medium">Lihat Tenants →</a>
                    </div>

                @elseif($booking->status == 'rejected')
                    <div class="text-center py-6">
                        <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-3">
                            <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </div>
                        <p class="text-gray-500 text-sm">Booking ini sudah ditolak.</p>
                    </div>

                @else
                    <div class="text-center py-6">
                        <p class="text-gray-400 text-sm">Menunggu tenant menyelesaikan pembayaran DP.</p>
                    </div>
                @endif
            </div>
        </div>

    </div>
@endsection