@extends('layouts.guest')
@section('title', 'Room Detail - e-Kost')

@section('content')
    <div class="bg-[#F2F2F2] min-h-screen py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Breadcrumb -->
            <nav class="mb-6 text-sm">
                <a href="{{ route('home') }}" class="text-gray-500 hover:text-[#035949]">Home</a>
                <span class="mx-2 text-gray-400">/</span>
                <a href="{{ route('rooms') }}" class="text-gray-500 hover:text-[#035949]">Rooms</a>
                <span class="mx-2 text-gray-400">/</span>
                <span class="text-[#012619] font-medium">{{ $room->type }} Room {{ $room->room_number }}</span>
            </nav>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Left Content: Gallery & Details -->
                <div class="lg:col-span-2 space-y-8">
                    <!-- Image Gallery -->
                    <div class="bg-white rounded-2xl p-4 shadow-md">
                        @if($room->photo)
                            <img src="{{ Storage::url($room->photo) }}" class="w-full h-80 object-cover rounded-xl mb-4">
                        @else
                            <img src="https://placehold.co/800x400/e2e8f0/475569?text=Room+{{ $room->room_number }}"
                                class="w-full h-80 object-cover rounded-xl mb-4">
                        @endif
                        <div class="grid grid-cols-4 gap-4">
                            <img src="https://placehold.co/200x200/e2e8f0/475569?text=Bed" class="w-full h-24 object-cover rounded-lg cursor-pointer opacity-70 hover:opacity-100 transition ring-2 ring-[#30BF62]">
                            <img src="https://placehold.co/200x200/e2e8f0/475569?text=Bathroom" class="w-full h-24 object-cover rounded-lg cursor-pointer opacity-70 hover:opacity-100 transition">
                            <img src="https://placehold.co/200x200/e2e8f0/475569?text=Wardrobe" class="w-full h-24 object-cover rounded-lg cursor-pointer opacity-70 hover:opacity-100 transition">
                            <img src="https://placehold.co/200x200/e2e8f0/475569?text=Desk" class="w-full h-24 object-cover rounded-lg cursor-pointer opacity-70 hover:opacity-100 transition">
                        </div>
                    </div>

                    <!-- Description & Specs -->
                    <div class="bg-white rounded-2xl shadow-md p-8">
                        <div class="flex justify-between items-start mb-6">
                            <div>
                                <h1 class="text-3xl font-bold text-[#012619] mb-2">{{ $room->type }} Room {{ $room->room_number }}</h1>
                                <p class="text-gray-500">Mapple Street No. 4, City Center</p>
                            </div>
                            @if($room->status == 'available')
                                <span class="bg-green-100 text-[#188C4A] px-3 py-1 rounded-full text-sm font-bold">Available</span>
                            @else
                                <span class="bg-red-100 text-red-600 px-3 py-1 rounded-full text-sm font-bold">Not Available</span>
                            @endif
                        </div>

                        <h2 class="text-xl font-semibold mb-4 text-[#012619] border-b border-gray-100 pb-2">Room Specs</h2>
                        <ul class="grid grid-cols-2 gap-4 mb-8 text-gray-700">
                            <li class="flex items-center"><span class="font-medium mr-2">Size:</span> 4x4 meters</li>
                            <li class="flex items-center"><span class="font-medium mr-2">Bed:</span> Queen Size</li>
                            <li class="flex items-center"><span class="font-medium mr-2">Window:</span> Yes (Outside View)</li>
                            <li class="flex items-center"><span class="font-medium mr-2">Gender:</span> Mixed</li>
                        </ul>

                        <h2 class="text-xl font-semibold mb-4 text-[#012619] border-b border-gray-100 pb-2">Facilities</h2>
                        <div class="flex flex-wrap gap-2 mb-8">
                            @if($room->facilities)
                                @foreach($room->facilities as $facility)
                                    <span class="bg-gray-100 text-gray-700 px-4 py-2 rounded-xl text-sm font-medium flex items-center">
                                        <svg class="w-4 h-4 mr-1 text-[#30BF62]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                        {{ $facility }}
                                    </span>
                                @endforeach
                            @else
                                <p class="text-gray-400 text-sm">Tidak ada fasilitas yang tercatat.</p>
                            @endif
                        </div>

                        <h2 class="text-xl font-semibold mb-4 text-[#012619] border-b border-gray-100 pb-2">Description</h2>
                        <p class="text-gray-700 leading-relaxed">
                            {{ $room->description ?? 'Tidak ada deskripsi untuk kamar ini.' }}
                        </p>
                    </div>
                </div>

                <!-- Right Content: Booking Card -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-2xl shadow-md p-6 sticky top-24">
                        <div class="mb-6">
                            <span class="block text-sm text-gray-500 mb-1">Price</span>
                            <div class="text-3xl font-extrabold text-[#30BF62]">Rp {{ number_format($room->price, 0, ',', '.') }}<span
                                    class="text-sm font-normal text-gray-500">/mo</span></div>
                        </div>

                        <hr class="border-gray-100 mb-6">

                        <form action="{{ route('booking.create') }}" method="GET" class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Check-in Date</label>
                                <input type="date" class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-[#30BF62] focus:border-[#30BF62]">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Duration</label>
                                <select class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-[#30BF62] focus:border-[#30BF62]">
                                    <option>1 Month</option>
                                    <option>3 Months (Save 5%)</option>
                                    <option>6 Months (Save 10%)</option>
                                    <option>1 Year (Save 15%)</option>
                                </select>
                            </div>

                            <button type="button" onclick="window.location.href='{{ route('booking.create') }}'" class="w-full bg-[#30BF62] text-white py-3 rounded-xl font-bold text-lg hover:bg-[#188C4A] shadow-md hover:shadow-lg transition duration-200 mt-6">
                                Book Now
                            </button>
                        </form>

                        <div class="mt-4 flex items-start text-sm text-gray-500 bg-gray-50 p-3 rounded-xl border border-gray-100">
                            <svg class="w-5 h-5 text-yellow-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <p>No deposit needed for monthly rental. ID card verification required.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
