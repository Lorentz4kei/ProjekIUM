@extends('layouts.guest')
@section('title', 'Home - e-Kost')

@section('content')
<!-- Hero Section -->
<div class="relative bg-[#012619] overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 lg:py-32 flex flex-col lg:flex-row items-center relative z-10">
        <div class="lg:w-1/2 text-white">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold tracking-tight mb-6">
                Premium Co-living Space in the City
            </h1>
            <p class="text-lg md:text-xl text-gray-300 mb-8 max-w-xl">
                Experience comfort, security, and fully furnished rooms tailored for professionals and students. Book your space today.
            </p>
            <div class="flex space-x-4">
                <a href="/rooms" class="bg-[#30BF62] text-white hover:bg-[#188C4A] px-6 py-3 rounded-xl font-semibold transition duration-200">Explore Rooms</a>
                <a href="/contact" class="bg-transparent border border-white hover:bg-white hover:text-[#012619] px-6 py-3 rounded-xl font-semibold transition duration-200">Contact Us</a>
            </div>
        </div>
        <div class="lg:w-1/2 mt-12 lg:mt-0 relative">
            <img src="https://placehold.co/600x400/188C4A/FFFFFF?text=Modern+Kost+Building" alt="Hero Image" class="rounded-2xl shadow-2xl relative z-10 transform lg:rotate-2 hover:rotate-0 transition duration-500">
            <!-- Decorative Blob -->
            <div class="absolute inset-0 bg-[#30BF62] rounded-full blur-3xl opacity-20 -z-0 transform translate-x-10 translate-y-10"></div>
        </div>
    </div>
</div>

<!-- Featured Rooms Section -->
<div class="py-20 bg-[#F2F2F2]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-[#012619]">Available Rooms</h2>
            <p class="text-gray-500 mt-2">Find the perfect type that fits your needs.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @for ($i = 0; $i < 3; $i++)
            <!-- Room Card -->
            <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-lg transition duration-200 group">
                <div class="relative overflow-hidden h-48">
                    <img src="https://placehold.co/400x300/e2e8f0/475569?text=Room+Type+{{ $i+1 }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <div class="absolute top-4 right-4 bg-white px-3 py-1 rounded-full text-xs font-bold text-[#012619] shadow-sm">Available</div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-[#012619] mb-1">Deluxe Room {{ $i+1 }}</h3>
                    <p class="text-[#30BF62] font-semibold mb-4">Rp 1,500,000 <span class="text-sm font-normal text-gray-500">/ month</span></p>
                    
                    <div class="flex flex-wrap gap-2 mb-6 text-sm text-gray-600">
                        <span class="bg-gray-100 px-2 py-1 rounded-md">AC</span>
                        <span class="bg-gray-100 px-2 py-1 rounded-md">WiFi</span>
                        <span class="bg-gray-100 px-2 py-1 rounded-md">Private Bath</span>
                    </div>

                    <a href="/rooms/1" class="block w-full text-center border border-[#035949] text-[#035949] hover:bg-[#035949] hover:text-white rounded-xl px-4 py-2 transition duration-200">View Detail</a>
                </div>
            </div>
            @endfor
        </div>
        
        <div class="mt-12 text-center">
            <a href="/rooms" class="text-[#188C4A] hover:text-[#035949] font-medium flex items-center justify-center transition">
                See all rooms <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
            </a>
        </div>
    </div>
</div>

<!-- Facilities Section -->
<div class="py-20 bg-white border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold text-[#012619] mb-12">Premium Facilities</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            <div class="flex flex-col items-center">
                <div class="w-16 h-16 bg-[#F2F2F2] rounded-2xl flex items-center justify-center text-[#30BF62] mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0" /></svg>
                </div>
                <h4 class="font-semibold text-[#012619]">High-Speed WiFi</h4>
            </div>
            <div class="flex flex-col items-center">
                <div class="w-16 h-16 bg-[#F2F2F2] rounded-2xl flex items-center justify-center text-[#30BF62] mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4V5a2 2 0 00-2-2H7a2 2 0 00-2 2v2" /></svg>
                </div>
                <h4 class="font-semibold text-[#012619]">24/7 Security CCTV</h4>
            </div>
            <div class="flex flex-col items-center">
                <div class="w-16 h-16 bg-[#F2F2F2] rounded-2xl flex items-center justify-center text-[#30BF62] mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                </div>
                <h4 class="font-semibold text-[#012619]">Communal Area</h4>
            </div>
            <div class="flex flex-col items-center">
                <div class="w-16 h-16 bg-[#F2F2F2] rounded-2xl flex items-center justify-center text-[#30BF62] mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" /></svg>
                </div>
                <h4 class="font-semibold text-[#012619]">Kitchen & Pantry</h4>
            </div>
        </div>
    </div>
</div>

<!-- CTA Banner -->
<div class="bg-[#30BF62] py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 text-center">
        <h2 class="text-3xl font-extrabold text-white mb-4">Ready to move in?</h2>
        <p class="text-white opacity-90 mb-8 text-lg">Join dozens of happy tenants experiencing quality living today.</p>
        <a href="/register" class="bg-white text-[#012619] px-8 py-3 rounded-xl font-bold shadow-lg hover:bg-gray-100 transition duration-200 inline-block">Create an Account</a>
    </div>
</div>
@endsection
