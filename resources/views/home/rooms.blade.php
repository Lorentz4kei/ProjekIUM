@extends('layouts.guest')
@section('title', 'Rooms - e-Kost')

@section('content')
<div class="bg-[#F2F2F2] min-h-screen py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header & Filter Bar -->
        <div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-3xl font-bold text-[#012619]">Available Rooms</h1>
                <p class="text-gray-500 mt-1">Showing 12 results</p>
            </div>
            <div class="flex space-x-2">
                <select class="border border-gray-300 rounded-xl px-4 py-2 focus:ring-[#30BF62] focus:border-[#30BF62] text-sm">
                    <option>All Types</option>
                    <option>Standard</option>
                    <option>Deluxe</option>
                    <option>VIP</option>
                </select>
                <select class="border border-gray-300 rounded-xl px-4 py-2 focus:ring-[#30BF62] focus:border-[#30BF62] text-sm">
                    <option>Lowest Price</option>
                    <option>Highest Price</option>
                    <option>Most Popular</option>
                </select>
            </div>
        </div>

        <!-- Room Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @for ($i = 0; $i < 8; $i++)
            <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-lg transition duration-200 group flex flex-col">
                <div class="relative overflow-hidden h-48">
                    <img src="https://placehold.co/400x300/e2e8f0/475569?text=Room+{{ $i+1 }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <div class="absolute top-3 right-3 bg-green-100 text-[#188C4A] px-2.5 py-1 rounded-full text-xs font-bold shadow-sm">2 Left!</div>
                </div>
                <div class="p-5 flex-grow flex flex-col justify-between">
                    <div>
                        <h3 class="text-lg font-bold text-[#012619] mb-1">Standard Room {{ $i+1 }}</h3>
                        <p class="text-[#30BF62] font-semibold mb-3">Rp 1,000,000 <span class="text-xs font-normal text-gray-500">/ mo</span></p>
                        
                        <ul class="text-sm text-gray-600 mb-4 space-y-1">
                            <li class="flex items-center"><svg class="w-4 h-4 mr-2 text-[#188C4A]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Single Bed</li>
                            <li class="flex items-center"><svg class="w-4 h-4 mr-2 text-[#188C4A]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> AC & WiFi</li>
                            <li class="flex items-center"><svg class="w-4 h-4 mr-2 text-[#188C4A]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Shared Bath</li>
                        </ul>
                    </div>
                    
                    <a href="{{ route('rooms.show', 1) }}" class="block w-full text-center border border-[#035949] text-[#035949] hover:bg-[#035949] hover:text-white rounded-xl px-4 py-2 transition duration-200">View Detail</a>
                </div>
            </div>
            @endfor
        </div>

        <!-- Pagination (Static) -->
        <div class="mt-12 flex justify-center">
            <nav class="flex items-center space-x-1 border border-gray-200 rounded-xl overflow-hidden bg-white shadow-sm p-1">
                <button class="px-3 py-1.5 text-gray-400 hover:text-[#012619] hover:bg-gray-100 rounded-lg text-sm font-medium transition cursor-not-allowed">Prevent</button>
                <button class="px-3 py-1.5 bg-[#30BF62] text-white rounded-lg text-sm font-medium transition">1</button>
                <button class="px-3 py-1.5 text-gray-600 hover:text-[#012619] hover:bg-gray-100 rounded-lg text-sm font-medium transition">2</button>
                <button class="px-3 py-1.5 text-gray-600 hover:text-[#012619] hover:bg-gray-100 rounded-lg text-sm font-medium transition">3</button>
                <button class="px-3 py-1.5 text-gray-600 hover:text-[#012619] hover:bg-gray-100 rounded-lg text-sm font-medium transition">Next</button>
            </nav>
        </div>

    </div>
</div>
@endsection
