@extends('layouts.tenant')
@section('title', 'Payment - e-Kost')

@section('content')
    <div class="max-w-2xl mx-auto">

        <!-- Invoice Summary -->
        <div class="bg-white rounded-2xl shadow-md p-6 sm:p-8 mb-6">
            <div class="flex justify-between items-center mb-6 pb-4 border-b border-gray-100">
                <div>
                    <h2 class="text-xl font-bold text-[#012619]">Invoice #{{ $payment->invoice_number }}</h2>
                    <p class="text-gray-500 text-sm mt-1">{{ $payment->due_date->format('F Y') }}</p>
                </div>
                <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-bold">Unpaid</span>
            </div>

            <div class="space-y-3 mb-6">
                <div class="flex justify-between text-sm">
                    <span class="text-gray-500">Tenant</span>
                    <span class="font-medium text-gray-900">{{ $payment->tenant->name }}</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-gray-500">Room</span>
                    <span class="font-medium text-gray-900">Room {{ $payment->tenant->room->room_number ?? '-' }}
                        ({{ $payment->tenant->room->type ?? '-' }})</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-gray-500">Due Date</span>
                    <span class="font-medium text-gray-900">{{ $payment->due_date->format('d M Y') }}</span>
                </div>
                <div class="flex justify-between text-sm border-t border-gray-100 pt-3 mt-3">
                    <span class="font-bold text-gray-900">Total Amount</span>
                    <span class="font-extrabold text-[#30BF62] text-xl">Rp
                        {{ number_format($payment->amount, 0, ',', '.') }}</span>
                </div>
            </div>

            <!-- Pay Button -->
            <button id="pay-button"
                class="w-full bg-[#30BF62] text-white hover:bg-[#188C4A] rounded-xl px-4 py-3 font-bold transition duration-200 shadow-md flex items-center justify-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                </svg>
                Bayar Sekarang
            </button>

            <p class="text-center text-xs text-gray-400 mt-3">Powered by Midtrans • Secure Payment</p>
        </div>

        <!-- Payment Status (muncul setelah bayar) -->
        <div id="payment-result" class="hidden bg-white rounded-2xl shadow-md p-6 text-center">
            <div id="result-icon" class="w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4"></div>
            <h3 id="result-title" class="text-xl font-bold mb-2"></h3>
            <p id="result-message" class="text-gray-500 text-sm mb-6"></p>
            <a href="{{ route('payments.index') }}"
                class="inline-block bg-[#30BF62] text-white hover:bg-[#188C4A] rounded-xl px-6 py-2 font-medium transition duration-200">
                Kembali ke Payments
            </a>
        </div>

    </div>

    {{-- Midtrans Snap JS --}}
    @if(config('services.midtrans.is_production'))
        <script src="https://app.midtrans.com/snap/snap.js"
            data-client-key="{{ config('services.midtrans.client_key') }}"></script>
    @else
        <script src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="{{ config('services.midtrans.client_key') }}"></script>
    @endif

    <script>
        document.getElementById('pay-button').addEventListener('click', function () {
            window.snap.pay('{{ $snapToken }}', {
                onSuccess: function (result) {
                    document.getElementById('payment-result').classList.remove('hidden');
                    document.getElementById('result-icon').innerHTML = '<svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>';
                    document.getElementById('result-icon').classList.add('bg-green-100');
                    document.getElementById('result-title').textContent = 'Pembayaran Berhasil!';
                    document.getElementById('result-message').textContent = 'Terima kasih, pembayaran Anda telah dikonfirmasi.';
                    document.getElementById('pay-button').closest('.bg-white').classList.add('hidden');
                },
                onPending: function (result) {
                    document.getElementById('payment-result').classList.remove('hidden');
                    document.getElementById('result-icon').innerHTML = '<svg class="w-8 h-8 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>';
                    document.getElementById('result-icon').classList.add('bg-yellow-100');
                    document.getElementById('result-title').textContent = 'Pembayaran Pending';
                    document.getElementById('result-message').textContent = 'Pembayaran Anda sedang diproses. Silakan selesaikan pembayaran.';
                    document.getElementById('pay-button').closest('.bg-white').classList.add('hidden');
                },
                onError: function (result) {
                    document.getElementById('payment-result').classList.remove('hidden');
                    document.getElementById('result-icon').innerHTML = '<svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>';
                    document.getElementById('result-icon').classList.add('bg-red-100');
                    document.getElementById('result-title').textContent = 'Pembayaran Gagal';
                    document.getElementById('result-message').textContent = 'Terjadi kesalahan. Silakan coba lagi.';
                },
                onClose: function () {
                    alert('Anda menutup halaman pembayaran sebelum menyelesaikan transaksi.');
                }
            });
        });
    </script>
@endsection