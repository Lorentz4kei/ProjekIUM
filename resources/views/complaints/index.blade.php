@extends('layouts.app')
@section('title', 'Complaints - e-Kost')
@section('header_title', 'Complaints Management')

@section('content')
<div class="flex flex-col sm:flex-row justify-between items-center mb-6 gap-4">
    <div class="flex gap-2 w-full sm:w-auto">
        <select class="border border-gray-300 rounded-xl px-4 py-2 focus:ring-[#30BF62] text-sm">
            <option>All Status</option>
            <option>Open</option>
            <option>In Progress</option>
            <option>Resolved</option>
        </select>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <!-- Unresolved column -->
    <div class="bg-gray-100 rounded-2xl p-4 flex flex-col max-h-[80vh]">
        <h3 class="font-bold text-[#012619] mb-4 flex items-center justify-between">
            Open / Pending <span class="bg-red-500 text-white text-xs px-2 py-0.5 rounded-full">2</span>
        </h3>
        
        <div class="space-y-4 overflow-y-auto pr-1">
            <a href="/complaints/1" class="block bg-white border-l-4 border-red-500 rounded-xl shadow-sm p-4 hover:shadow-md transition">
                <div class="flex justify-between items-start mb-2">
                    <span class="text-xs font-bold text-gray-500">Room 102</span>
                    <span class="text-xs text-gray-400">2 hours ago</span>
                </div>
                <h4 class="font-bold text-[#012619] text-sm mb-1">AC Not Cold</h4>
                <p class="text-xs text-gray-500 line-clamp-2">The AC has been running for 3 hours but the room is still very hot. Water is dripping.</p>
            </a>
            
            <a href="/complaints/1" class="block bg-white border-l-4 border-yellow-500 rounded-xl shadow-sm p-4 hover:shadow-md transition">
                <div class="flex justify-between items-start mb-2">
                    <span class="text-xs font-bold text-gray-500">Room 205</span>
                    <span class="text-xs text-gray-400">1 day ago</span>
                </div>
                <h4 class="font-bold text-[#012619] text-sm mb-1">Noisy Neighbor</h4>
                <p class="text-xs text-gray-500 line-clamp-2">Guest next door is playing loud music after 11 PM.</p>
            </a>
        </div>
    </div>

    <!-- In Progress column -->
    <div class="bg-gray-100 rounded-2xl p-4 flex flex-col max-h-[80vh]">
        <h3 class="font-bold text-[#012619] mb-4 flex items-center justify-between">
            In Progress <span class="bg-blue-500 text-white text-xs px-2 py-0.5 rounded-full">1</span>
        </h3>
        <div class="space-y-4 overflow-y-auto pr-1">
            <a href="/complaints/1" class="block bg-white border-l-4 border-blue-500 rounded-xl shadow-sm p-4 hover:shadow-md transition">
                <div class="flex justify-between items-start mb-2">
                    <span class="text-xs font-bold text-gray-500">Room 101</span>
                    <span class="text-xs text-gray-400">2 days ago</span>
                </div>
                <h4 class="font-bold text-[#012619] text-sm mb-1">Leaking Sink</h4>
                <p class="text-xs text-gray-500 line-clamp-2">Bathroom sink is leaking, technician already checked it.</p>
                <div class="mt-3 text-xs text-blue-600 bg-blue-50 px-2 py-1 rounded inline-block">Technician working</div>
            </a>
        </div>
    </div>

    <!-- Resolved column -->
    <div class="bg-gray-100 rounded-2xl p-4 flex flex-col max-h-[80vh]">
        <h3 class="font-bold text-[#012619] mb-4 flex items-center justify-between">
            Resolved <span class="bg-[#30BF62] text-white text-xs px-2 py-0.5 rounded-full">12</span>
        </h3>
        <div class="space-y-4 overflow-y-auto pr-1">
            <a href="/complaints/1" class="block bg-white border-l-4 border-[#30BF62] opacity-80 rounded-xl shadow-sm p-4 hover:shadow-md transition">
                <div class="flex justify-between items-start mb-2">
                    <span class="text-xs font-bold text-gray-500">Communal Area</span>
                    <span class="text-xs text-gray-400">5 days ago</span>
                </div>
                <h4 class="font-bold text-gray-700 text-sm mb-1 line-through">Internet Down</h4>
                <p class="text-xs text-gray-400 line-clamp-2">WiFi in the lobby is not connecting.</p>
            </a>
        </div>
    </div>
</div>
@endsection
