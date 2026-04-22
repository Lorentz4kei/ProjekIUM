@extends('layouts.app')
@section('title', 'Edit Profile - e-Kost')
@section('header_title', 'Edit Profile')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">
    <div class="mb-4">
        <a href="{{ route('profile.index') }}" class="text-sm font-medium text-gray-500 hover:text-[#012619] inline-flex items-center">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg> Back to Profile
        </a>
    </div>

    <form class="space-y-6" x-data="{ fileName: '' }">
        <!-- Basic Info Box -->
        <div class="bg-white rounded-2xl shadow-md p-6 sm:p-8">
            <h3 class="font-bold text-[#012619] text-lg mb-6 pb-2 border-b border-gray-100">Basic Information</h3>
            
            <div class="mb-6 flex items-center space-x-6">
                <div class="relative">
                    <img src="https://placehold.co/150x150/e2e8f0/475569?text=Admin" alt="Admin Avatar" class="w-20 h-20 rounded-full object-cover border border-gray-200">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Change Avatar</label>
                    <input type="file" class="text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-[#188C4A] hover:file:bg-green-100 transition">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                    <input type="text" value="Admin eKost" class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-[#30BF62] focus:border-[#30BF62]">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                    <input type="email" value="admin@kos.com" class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-[#30BF62] focus:border-[#30BF62]">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                    <input type="tel" value="+62 811 0000 1111" class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-[#30BF62] focus:border-[#30BF62]">
                </div>
            </div>
        </div>

        <!-- Security Box -->
        <div class="bg-white rounded-2xl shadow-md p-6 sm:p-8">
            <h3 class="font-bold text-[#012619] text-lg mb-6 pb-2 border-b border-gray-100">Change Password</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Current Password</label>
                    <input type="password" placeholder="••••••••" class="w-full md:w-1/2 border border-gray-300 rounded-xl px-4 py-2 focus:ring-[#30BF62] focus:border-[#30BF62]">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">New Password</label>
                    <input type="password" placeholder="Min. 8 characters" class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-[#30BF62] focus:border-[#30BF62]">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Confirm New Password</label>
                    <input type="password" placeholder="Re-type new password" class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-[#30BF62] focus:border-[#30BF62]">
                </div>
            </div>
        </div>

        <div class="flex justify-end gap-3 pt-2">
            <button type="button" onclick="window.location.href='{{ route('profile.index') }}'" class="border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 rounded-xl px-6 py-2.5 font-medium transition duration-200">Cancel</button>
            <button type="button" class="bg-[#30BF62] text-white hover:bg-[#188C4A] rounded-xl px-6 py-2.5 font-bold transition duration-200 shadow-md">Save Changes</button>
        </div>
    </form>
</div>
@endsection
