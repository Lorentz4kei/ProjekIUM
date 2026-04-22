@extends('layouts.app')
@section('title', 'Payment Detail - e-Kost')
@section('header_title', 'Payment Detail')

@section('content')
<div class="max-w-3xl mx-auto">
    <a href="{{ route('payments.index') }}" class="text-sm font-medium text-gray-500 hover:text-[#012619] inline-flex items-center mb-6">
        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg> Back to Payments
    </a>

    <div class="bg-white rounded-2xl shadow-md p-6 sm:p-8">
        <div class="flex justify-between items-start mb-8 pb-6 border-b border-gray-100">
            <div>
                <h2 class="text-2xl font-bold text-[#012619]">Invoice #INV-260302</h2>
                <p class="text-gray-500 mt-1">Paid on 12 Mar 2026, 14:30</p>
            </div>
            <span class="bg-green-100 text-[#188C4A] px-4 py-2 rounded-xl font-bold border border-green-200">Verified Paid</span>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 mb-8">
            <div>
                <h3 class="text-sm text-gray-500 mb-1">Billed To</h3>
                <p class="font-bold text-[#012619] text-lg">Aisyah Bella</p>
                <p class="text-gray-600">Room 102 (Deluxe)</p>
                <p class="text-gray-600">aisyah@example.com</p>
            </div>
            <div class="sm:text-right">
                <h3 class="text-sm text-gray-500 mb-1">Period</h3>
                <p class="font-medium text-gray-800">12 Mar 2026 - 12 Apr 2026</p>
                <h3 class="text-sm text-gray-500 mb-1 mt-4">Due Date</h3>
                <p class="font-medium text-gray-800">12 Mar 2026</p>
            </div>
        </div>

        <table class="w-full text-left mb-8">
            <thead>
                <tr class="border-b border-gray-200 text-gray-500 text-sm">
                    <th class="font-normal pb-3 w-3/4">Description</th>
                    <th class="font-normal pb-3 text-right">Amount</th>
                </tr>
            </thead>
            <tbody class="text-gray-800">
                <tr>
                    <td class="py-4 border-b border-gray-100">Monthly Rent Fee - Room 102</td>
                    <td class="py-4 border-b border-gray-100 text-right">Rp 2,000,000</td>
                </tr>
                <tr>
                    <td class="py-4 border-b border-gray-100">Additional WiFi Device</td>
                    <td class="py-4 border-b border-gray-100 text-right">Rp 50,000</td>
                </tr>
            </tbody>
            <tfoot>
                <tr class="text-lg">
                    <td class="py-4 font-bold text-[#012619] text-right">Total Paid</td>
                    <td class="py-4 font-extrabold text-[#30BF62] text-right">Rp 2,050,000</td>
                </tr>
            </tfoot>
        </table>

        <!-- Proof Image Link / Modal trigger -->
        <div class="bg-gray-50 rounded-xl p-4 border border-gray-200 flex items-center justify-between">
            <div class="flex items-center">
                <svg class="w-8 h-8 text-[#188C4A] mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                <div>
                    <p class="font-medium text-gray-900">Transfer Proof</p>
                    <p class="text-xs text-gray-500">receipt_Mbanking_Aisyah.jpg</p>
                </div>
            </div>
            <button class="text-[#035949] hover:underline text-sm font-medium">View Image</button>
        </div>
        
    </div>
</div>
@endsection
