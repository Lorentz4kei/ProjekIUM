@extends('layouts.app')
@section('title', 'Tenants List - e-Kost')
@section('header_title', 'Tenants')

@section('content')
<div class="bg-white rounded-2xl shadow-md overflow-hidden">
    
    <!-- Table Header Actions -->
    <div class="p-6 border-b border-gray-100 flex flex-col sm:flex-row justify-between items-center gap-4">
        <div class="relative w-full sm:w-64">
            <input type="text" placeholder="Search tenant..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-xl focus:ring-[#30BF62] focus:border-[#30BF62] transition text-sm">
            <svg class="w-5 h-5 text-gray-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
        </div>
        <div class="flex gap-2 w-full sm:w-auto">
            <select class="border border-gray-300 rounded-xl px-4 py-2 text-sm focus:ring-[#30BF62]">
                <option>Active</option>
                <option>Pending</option>
                <option>Past</option>
            </select>
            <a href="{{ route('tenants.create') }}" class="bg-[#30BF62] text-white hover:bg-[#188C4A] rounded-xl px-4 py-2 text-sm font-medium transition shadow-sm flex items-center">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg> Add Tenant
            </a>
        </div>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="w-full whitespace-nowrap">
            <thead class="bg-[#012619] text-white text-left text-sm uppercase font-semibold">
                <tr>
                    <th class="px-6 py-4 rounded-tl-xl sm:rounded-none">Tenant Name</th>
                    <th class="px-6 py-4">Room</th>
                    <th class="px-6 py-4">Contract End</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-sm text-gray-700">
                @for($i=1; $i<=5; $i++)
                <tr class="hover:bg-gray-50 transition even:bg-gray-50/50">
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            <div class="h-10 w-10 flex-shrink-0">
                                <div class="h-10 w-10 rounded-full bg-green-100 text-[#188C4A] flex items-center justify-center font-bold">
                                    {{ ['JS', 'AB', 'RW', 'MK', 'LD'][$i-1] }}
                                </div>
                            </div>
                            <div class="ml-4">
                                <div class="font-medium text-gray-900">{{ ['John Smith', 'Aisyah Bella', 'Reza Wijaya', 'Siti Maimunah', 'Larry Doe'][$i-1] }}</div>
                                <div class="text-gray-500">0812-3456-78{{$i}}0</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 font-medium text-gray-900">Room {{ 100+$i }}</td>
                    <td class="px-6 py-4">12 Oct 2026</td>
                    <td class="px-6 py-4">
                        @if($i == 2)
                        <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-semibold">Pending</span>
                        @else
                        <span class="bg-green-100 text-[#188C4A] px-3 py-1 rounded-full text-xs font-semibold">Active</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex justify-center space-x-2" x-data>
                            <a href="{{ route('tenants.show', 1) }}" class="text-gray-400 hover:text-blue-500 transition p-1" title="View"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg></a>
                            <a href="{{ route('tenants.edit', 1) }}" class="text-gray-400 hover:text-yellow-500 transition p-1" title="Edit"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg></a>
                            <button @click="$dispatch('open-modal', 'delete-modal')" class="text-gray-400 hover:text-red-500 transition p-1" title="Delete"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg></button>
                        </div>
                    </td>
                </tr>
                @endfor
            </tbody>
        </table>
    </div>
    
    <!-- Static Pagination Footer -->
    <div class="px-6 py-4 border-t border-gray-100 flex items-center justify-between text-sm">
        <span class="text-gray-500">Showing 1 to 5 of 20 results</span>
        <div class="flex gap-1">
            <button class="px-3 py-1 border border-gray-300 rounded-md text-gray-500 cursor-not-allowed">Peri</button>
            <button class="px-3 py-1 bg-[#30BF62] text-white rounded-md">1</button>
            <button class="px-3 py-1 border border-gray-300 rounded-md hover:bg-gray-50">2</button>
            <button class="px-3 py-1 border border-gray-300 rounded-md hover:bg-gray-50">Next</button>
        </div>
    </div>
</div>

@include('partials.modal', ['id' => 'delete-modal', 'title' => 'Delete Tenant', 'slot' => 'Are you sure you want to delete this tenant? All data will be permanently removed.'])
@endsection
