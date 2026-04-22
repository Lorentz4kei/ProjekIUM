@extends('layouts.app')
@section('title', 'My Profile - e-Kost')
@section('header_title', 'Profile')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">
    
    <!-- Profile Header Card -->
    <div class="bg-white rounded-2xl shadow-md p-6 sm:p-8 flex flex-col sm:flex-row items-center sm:items-start gap-6 border-t-8 border-[#012619]">
        <div class="relative">
            <img src="https://placehold.co/150x150/e2e8f0/475569?text=Admin" alt="Admin Avatar" class="w-24 h-24 sm:w-32 sm:h-32 rounded-full object-cover border-4 border-white shadow-sm ring-2 ring-gray-100">
            <div class="absolute bottom-1 right-1 bg-[#30BF62] w-4 h-4 sm:w-5 sm:h-5 rounded-full border-2 border-white"></div>
        </div>
        
        <div class="flex-grow text-center sm:text-left">
            <h1 class="text-2xl font-bold text-[#012619] mb-1">Admin eKost</h1>
            <p class="text-gray-500 mb-3">System Administrator & Owner</p>
            <span class="bg-[#035949] text-white px-3 py-1 rounded-full text-xs font-semibold tracking-wider uppercase">Super Admin</span>
        </div>
        
        <div class="sm:self-stretch flex items-start">
            <a href="{{ route('profile.edit') }}" class="bg-gray-100 text-gray-700 hover:bg-gray-200 px-4 py-2 rounded-xl text-sm font-medium transition flex items-center shadow-sm">
                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" /></svg> Edit Profile
            </a>
        </div>
    </div>

    <!-- Profile Details Card -->
    <div class="bg-white rounded-2xl shadow-md p-6 sm:p-8">
        <h3 class="font-bold text-[#012619] text-lg mb-6 pb-2 border-b border-gray-100">Contact Information</h3>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-6 gap-x-12">
            <div>
                <span class="text-sm text-gray-500 block mb-1">Full Name</span>
                <span class="font-medium text-gray-900">Admin eKost</span>
            </div>
            <div>
                <span class="text-sm text-gray-500 block mb-1">Email Address</span>
                <span class="font-medium text-gray-900">admin@kos.com</span>
            </div>
            <div>
                <span class="text-sm text-gray-500 block mb-1">Phone Number</span>
                <span class="font-medium text-gray-900">+62 811 0000 1111</span>
            </div>
            <div>
                <span class="text-sm text-gray-500 block mb-1">Property Address</span>
                <span class="font-medium text-gray-900">Mapple Street No. 4, City Center, 12345</span>
            </div>
            <div>
                <span class="text-sm text-gray-500 block mb-1">Joined Date</span>
                <span class="font-medium text-gray-900">01 Jan 2025</span>
            </div>
        </div>
    </div>
</div>
@endsection
