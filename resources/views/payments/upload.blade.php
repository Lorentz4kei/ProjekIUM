@extends('layouts.tenant')
@section('title', 'Upload Payment - e-Kost')

@section('content')
    <div class="max-w-2xl mx-auto bg-white rounded-2xl shadow-md p-6 sm:p-8">
        <div class="text-center mb-8">
            <h1 class="text-2xl font-bold text-[#012619]">Confirm Payment</h1>
            <p class="text-gray-500 mt-2">Upload your monthly rent transfer receipt here.</p>
        </div>

        <!-- Invoice Summary -->
        <div class="bg-gray-50 p-6 rounded-xl border border-gray-200 mb-8 border-l-4 border-l-[#30BF62]">
            <h3 class="font-bold text-lg text-gray-900 mb-4">Invoice #{{ $payment->invoice_number }}</h3>
            <div class="flex justify-between items-center mb-2 text-sm">
                <span class="text-gray-600">Room</span>
                <span class="font-medium text-gray-900">{{ $tenant->room->room_number ?? '-' }}</span>
            </div>
            <div class="flex justify-between items-center mb-2 text-sm border-b border-gray-200 pb-2">
                <span class="text-gray-600">Period</span>
                <span class="font-medium text-gray-900">{{ $payment->due_date->format('F Y') }}</span>
            </div>
            <div class="flex justify-between items-center mt-3">
                <span class="font-bold text-gray-900">Total Due</span>
                <span class="text-2xl font-extrabold text-[#30BF62]">Rp {{ number_format($payment->amount, 0, ',', '.') }}</span>
            </div>
        </div>

        <!-- Upload Form -->
        <form action="{{ route('payments.upload.post') }}" method="POST" enctype="multipart/form-data" class="space-y-6"
            x-data="{ fileName: '' }">
            @csrf
            <input type="hidden" name="payment_id" value="{{ $payment->id }}">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Transfer Date</label>
                <input type="date" name="transfer_date" value="{{ old('transfer_date', date('Y-m-d')) }}"
                    class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-[#30BF62] focus:border-[#30BF62]" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Bank Sender Name (Optional)</label>
                <input type="text" name="sender_name" value="{{ old('sender_name') }}" placeholder="e.g. John Smith"
                    class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-[#30BF62] focus:border-[#30BF62]">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Upload Receipt Proof <span class="text-red-500">*</span></label>
                <div class="flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-xl hover:border-[#30BF62] transition bg-gray-50">
                    <div class="space-y-1 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="flex text-sm text-gray-600 justify-center">
                            <label class="relative cursor-pointer bg-transparent rounded-md font-medium text-[#188C4A] hover:text-[#035949] focus-within:outline-none">
                                <span x-text="fileName === '' ? 'Upload a file' : fileName"></span>
                                <input type="file" name="proof_photo" required accept="image/*"
                                    class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" @change="fileName = $event.target.files[0].name">
                            </label>
                        </div>
                        <p class="text-xs text-gray-500" x-show="fileName === ''">JPG, PNG up to 2MB</p>
                    </div>
                </div>
            </div>

            <button type="submit"
                class="w-full bg-[#30BF62] text-white hover:bg-[#188C4A] rounded-xl px-4 py-3 font-bold transition duration-200 mt-4 shadow-md">
                Submit Payment
            </button>
            <p class="text-center text-sm text-gray-500">Admin will verify your payment in 1-2 hours.</p>
        </form>
    </div>
@endsection
