@extends('layouts.app')
@section('title', 'Room Form - e-Kost')
@section('header_title', 'Create / Edit Room')

@section('content')
<div class="max-w-4xl bg-white rounded-2xl shadow-md p-6 sm:p-8">
    <div class="mb-6 pb-4 border-b border-gray-100 flex items-center justify-between">
        <h2 class="text-xl font-bold text-[#012619]">Room Details</h2>
        <a href="/dashboard/rooms" class="text-gray-400 hover:text-[#012619] transition">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
        </a>
    </div>

    <form action="#" method="POST" class="space-y-6">
        @csrf
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Room Name/Number</label>
                <input type="text" placeholder="e.g. 101 or VIP A" class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-2 focus:ring-[#30BF62] focus:border-transparent transition" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Room Type</label>
                <select class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-2 focus:ring-[#30BF62] focus:border-transparent transition">
                    <option>Standard</option>
                    <option>Deluxe</option>
                    <option>VIP</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Monthly Rent Price (Rp)</label>
                <input type="number" placeholder="1500000" class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-2 focus:ring-[#30BF62] focus:border-transparent transition" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                <select class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-2 focus:ring-[#30BF62] focus:border-transparent transition">
                    <option>Available</option>
                    <option>Occupied</option>
                    <option>Maintenance</option>
                </select>
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Room Description</label>
            <textarea rows="3" placeholder="Describe the room characteristics..." class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-2 focus:ring-[#30BF62] focus:border-transparent transition"></textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-3">Room Facilities</label>
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                <label class="flex items-center space-x-2">
                    <input type="checkbox" class="w-4 h-4 text-[#30BF62] border-gray-300 rounded focus:ring-[#30BF62]" checked>
                    <span class="text-sm text-gray-700">AC</span>
                </label>
                <label class="flex items-center space-x-2">
                    <input type="checkbox" class="w-4 h-4 text-[#30BF62] border-gray-300 rounded focus:ring-[#30BF62]" checked>
                    <span class="text-sm text-gray-700">Private Bed</span>
                </label>
                <label class="flex items-center space-x-2">
                    <input type="checkbox" class="w-4 h-4 text-[#30BF62] border-gray-300 rounded focus:ring-[#30BF62]">
                    <span class="text-sm text-gray-700">Private Bathroom</span>
                </label>
                <label class="flex items-center space-x-2">
                    <input type="checkbox" class="w-4 h-4 text-[#30BF62] border-gray-300 rounded focus:ring-[#30BF62]">
                    <span class="text-sm text-gray-700">Hot Water</span>
                </label>
                <label class="flex items-center space-x-2">
                    <input type="checkbox" class="w-4 h-4 text-[#30BF62] border-gray-300 rounded focus:ring-[#30BF62]">
                    <span class="text-sm text-gray-700">TV</span>
                </label>
                <label class="flex items-center space-x-2">
                    <input type="checkbox" class="w-4 h-4 text-[#30BF62] border-gray-300 rounded focus:ring-[#30BF62]">
                    <span class="text-sm text-gray-700">Wardrobe</span>
                </label>
                <label class="flex items-center space-x-2">
                    <input type="checkbox" class="w-4 h-4 text-[#30BF62] border-gray-300 rounded focus:ring-[#30BF62]" checked>
                    <span class="text-sm text-gray-700">WiFi access</span>
                </label>
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Room Photo Thumbnail</label>
            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-xl hover:border-[#30BF62] transition bg-gray-50">
                <div class="space-y-1 text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48"><path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></svg>
                    <div class="flex text-sm text-gray-600 justify-center">
                        <label class="relative cursor-pointer bg-white rounded-md font-medium text-[#188C4A] hover:text-[#035949] focus-within:outline-none focus-within:ring-2 focus-within:ring-[#30BF62]">
                            <span>Upload a photo</span>
                            <input type="file" class="sr-only">
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-end gap-3 pt-4 border-t border-gray-100">
            <button type="button" onclick="window.history.back()" class="border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 rounded-xl px-5 py-2 font-medium transition duration-200">Cancel</button>
            <button type="button" onclick="window.location.href='/dashboard/rooms'" class="bg-[#30BF62] text-white hover:bg-[#188C4A] rounded-xl px-5 py-2 font-medium transition duration-200 shadow-sm">Save Room</button>
        </div>
    </form>
</div>
@endsection
