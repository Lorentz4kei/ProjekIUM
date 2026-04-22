@extends('layouts.app')
@section('title', 'Complaint Detail - e-Kost')
@section('header_title', 'Complaint Detail')

@section('content')
<div class="mb-4">
    <a href="{{ route('complaints.index') }}" class="text-sm font-medium text-gray-500 hover:text-[#012619] inline-flex items-center">
        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg> Back
    </a>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <div class="lg:col-span-2 space-y-6">
        
        <div class="bg-white rounded-2xl shadow-md p-6 sm:p-8">
            <div class="flex justify-between items-start mb-6 pb-4 border-b border-gray-100">
                <div>
                    <h2 class="text-2xl font-bold text-[#012619]">AC Not Cold & Leaking</h2>
                    <p class="text-gray-500 text-sm mt-1">Submitted 2 hours ago by John Smith (Room 102)</p>
                </div>
                <span class="bg-red-100 text-red-600 px-3 py-1 rounded-full text-xs font-bold ring-1 ring-red-400">Open</span>
            </div>

            <div class="text-gray-700 leading-relaxed text-sm mb-6">
                "The AC has been running for 3 hours but the room is still very hot. Also, there is water dripping from the indoor unit near the bed. Please send someone to fix it soon."
            </div>

            <div class="mb-6">
                <!-- Attached Photo -->
                <img src="https://placehold.co/500x300/e2e8f0/475569?text=AC+Leaking+Photo" class="rounded-xl border border-gray-200">
            </div>

            <!-- Update Status Actions -->
            <div class="bg-gray-50 rounded-xl p-4 border border-gray-200">
                <h3 class="font-bold text-gray-900 mb-3 text-sm">Update Status</h3>
                <div class="flex flex-wrap gap-2">
                    <button class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-blue-700 transition">Mark In Progress</button>
                    <button class="bg-[#30BF62] text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-[#188C4A] transition">Mark Resolved</button>
                    <button class="bg-white border border-gray-300 text-gray-700 px-4 py-2 rounded-lg text-sm font-medium hover:bg-gray-50 transition">Reject/Invalid</button>
                </div>
            </div>
        </div>

    </div>

    <!-- Timeline/Comments Sidebar -->
    <div class="bg-white rounded-2xl shadow-md p-6">
        <h3 class="font-bold text-[#012619] mb-6">Activity Logs</h3>
        
        <div class="space-y-6 relative relative-step pl-4 border-l-2 border-gray-200 ml-2">
            <div class="relative">
                <span class="absolute -left-[25px] bg-gray-400 w-3 h-3 rounded-full ring-4 ring-gray-100"></span>
                <h4 class="font-bold text-gray-800 text-sm">Ticket Created</h4>
                <p class="text-xs text-gray-500 my-0.5">By John Smith</p>
                <span class="text-xs text-gray-400">Today, 08:30</span>
            </div>
            
            <div class="relative">
                <span class="absolute -left-[25px] bg-blue-500 w-3 h-3 rounded-full ring-4 ring-blue-100"></span>
                <h4 class="font-bold text-gray-800 text-sm">Admin Replied</h4>
                <p class="text-xs bg-gray-50 p-2 rounded border border-gray-100 mt-2">"We have notified the technician, they will come at 1 PM."</p>
                <span class="text-xs text-gray-400 block mt-1">Today, 09:15</span>
            </div>
        </div>

        <form class="mt-8 pt-4 border-t border-gray-100">
            <label class="block text-sm font-medium text-gray-700 mb-2">Leave a comment/reply</label>
            <textarea rows="3" class="w-full border border-gray-300 rounded-xl px-3 py-2 text-sm focus:ring-[#30BF62]" placeholder="Message to tenant..."></textarea>
            <button type="button" class="mt-3 w-full bg-[#012619] text-white py-2 rounded-xl text-sm font-bold hover:bg-[#035949] transition">Send Reply</button>
        </form>
    </div>
</div>
@endsection
