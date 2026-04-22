@extends('layouts.app')
@section('title', 'Occupancy Report - e-Kost')
@section('header_title', 'Occupancy Report')

@section('content')
<div class="mb-4">
    <a href="{{ route('reports.index') }}" class="text-sm font-medium text-gray-500 hover:text-[#012619] inline-flex items-center">
        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg> Back to Reports
    </a>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    
    <!-- Left: Metrics & Pie Chart -->
    <div class="space-y-6">
        <div class="bg-white rounded-2xl shadow-md p-6 text-center border-t-4 border-[#30BF62]">
            <h3 class="text-gray-500 text-sm font-medium mb-1">Current Occupancy Rate</h3>
            <p class="text-5xl font-extrabold text-[#012619] my-4">80%</p>
            <p class="text-sm text-green-600 font-medium">+5% from last month</p>
        </div>

        <div class="bg-white rounded-2xl shadow-md p-6">
            <h3 class="font-bold text-[#012619] mb-4 border-b border-gray-100 pb-2">Room Distribution</h3>
            <div class="space-y-4 text-sm mt-4">
                <div>
                    <div class="flex justify-between mb-1">
                        <span class="text-gray-600">Occupied (20)</span>
                        <span class="font-medium text-[#012619]">80%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                        <div class="bg-[#30BF62] h-2.5 rounded-full w-[80%]"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between mb-1">
                        <span class="text-gray-600">Available (4)</span>
                        <span class="font-medium text-[#012619]">16%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                        <div class="bg-blue-400 h-2.5 rounded-full w-[16%]"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between mb-1">
                        <span class="text-gray-600">Maintenance (1)</span>
                        <span class="font-medium text-[#012619]">4%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                        <div class="bg-red-400 h-2.5 rounded-full w-[4%]"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Right: Detail Table -->
    <div class="lg:col-span-2 bg-white rounded-2xl shadow-md p-6">
        <div class="flex justify-between items-center mb-6 border-b border-gray-100 pb-4">
            <h3 class="font-bold text-[#012619] text-lg">Room Status Detail</h3>
            <button class="bg-[#035949] text-white px-3 py-1.5 rounded-lg text-sm font-medium hover:bg-[#012619] transition flex items-center">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" /></svg> Export
            </button>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm whitespace-nowrap">
                <thead class="text-gray-500 mb-2 border-b border-gray-200">
                    <tr>
                        <th class="pb-3 font-normal">Room No.</th>
                        <th class="pb-3 font-normal">Type</th>
                        <th class="pb-3 font-normal">Tenant</th>
                        <th class="pb-3 font-normal text-right">Status</th>
                    </tr>
                </thead>
                <tbody class="text-gray-800 divide-y divide-gray-100">
                    <tr class="hover:bg-gray-50">
                        <td class="py-3 font-bold">Room 101</td>
                        <td class="py-3 text-gray-500">Standard</td>
                        <td class="py-3">John Smith</td>
                        <td class="py-3 text-right"><span class="bg-gray-100 text-gray-600 px-2 py-1 rounded text-xs">Occupied</span></td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="py-3 font-bold">Room 102</td>
                        <td class="py-3 text-gray-500">Standard</td>
                        <td class="py-3">Aisyah Bella</td>
                        <td class="py-3 text-right"><span class="bg-gray-100 text-gray-600 px-2 py-1 rounded text-xs">Occupied</span></td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="py-3 font-bold">Room 103</td>
                        <td class="py-3 text-gray-500">VIP</td>
                        <td class="py-3 text-gray-400 italic">-</td>
                        <td class="py-3 text-right"><span class="bg-green-100 text-green-700 font-bold px-2 py-1 rounded text-xs">Available</span></td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="py-3 font-bold">Room 104</td>
                        <td class="py-3 text-gray-500">Deluxe</td>
                        <td class="py-3 text-gray-400 italic">-</td>
                        <td class="py-3 text-right"><span class="bg-red-100 text-red-700 font-bold px-2 py-1 rounded text-xs">Maintenance</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
