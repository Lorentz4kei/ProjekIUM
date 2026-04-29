@extends('layouts.guest')
@section('title', 'Payment DP - e-Kost')

@section('content')
    <div class="bg-[#F2F2F2] min-h-[calc(100vh-64px)] py-12">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Stepper -->
            <div class="mb-10 text-center">
                <div class="flex items-center justify-center text-sm font-medium">
                    <div class="flex items-center text-gray-400">
                        <span class="w-8 h-8 flex items-center justify-center bg-white border-2 border-gray-300 rounded-full font-bold">1</span>
                    </div>
                    <div class="w-10 sm:w-24 mx-2 h-0.5 bg-[#30BF62]"></div>
                    <div class="flex items-center text-[#30BF62]">
                        <span class="w-8 h-8 flex items-center justify-center bg-[#30BF62] text-white rounded-full font-bold shadow-sm">2</span>
                    </div>
                    <div class="w-10 sm:w-24 mx-2 h-0.5 bg-gray-200"></div>
                    <div class="flex items-center text-gray-400">
                        <span class="w-8 h-8 flex items-center justify-center bg-white border-2 border-gray-300 rounded-full font-bold">3</span>
                    </div>
                </div>
                <h1 class="text-2xl font-bold text-[#012619] mt-6">Down Payment</h1>
                <p class="text-gray-500 mt-2">Complete your DP payment to secure Room {{ $booking->room->room_number }}.</p>
            </div>

            <div class="bg-white rounded-2xl shadow-md overflow-hidden">
                <!-- Amount & Bank Info -->
                <div class="p-8 border-b border-gray-100 bg-[#012619] text-white text-center">
                    <p class="text-gray-300 mb-1">Total to Transfer (DP 50%)</p>
                    <div class="text-4xl font-extrabold text-[#30BF62] mb-6">Rp {{ number_format($booking->dp_amount, 0, ',', '.') }}</div>
                    <p class="text-gray-300 text-sm mb-6">Booking #{{ $booking->booking_code }} • Room {{ $booking->room->room_number }}</p>
                </div>

                <!-- Upload Form -->
                <div class="p-8">
                    <h3 class="text-lg font-bold text-[#012619] mb-4">Upload Transfer Proof</h3>

                    <div class="space-y-4">
                        {{-- Tombol bayar via Midtrans --}}
                        <button id="pay-dp-button"
                            class="w-full bg-[#30BF62] text-white py-3 rounded-xl font-bold hover:bg-[#188C4A] transition shadow-md flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                            </svg>
                            Bayar DP Sekarang
                        </button>

                        {{-- Status setelah bayar --}}
                        <div id="payment-result" class="hidden bg-white rounded-xl p-4 text-center">
                            <div id="result-icon" class="w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-3"></div>
                            <h3 id="result-title" class="font-bold text-lg mb-1"></h3>
                            <p id="result-message" class="text-gray-500 text-sm mb-4"></p>
                            <a href="{{ route('booking.confirmation', $booking->id) }}" id="result-link"
                                class="hidden inline-block bg-[#30BF62] text-white hover:bg-[#188C4A] rounded-xl px-6 py-2 font-medium transition duration-200">
                                Lihat Konfirmasi
                            </a>
                        </div>

                        <div class="text-center mt-4">
                            <a href="{{ route('home') }}" class="text-sm text-gray-500 hover:text-[#012619]">Cancel or Go Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(config('services.midtrans.is_production'))
        <script src="https://app.midtrans.com/snap/snap.js"
            data-client-key="{{ config('services.midtrans.client_key') }}"></script>
    @else
        <script src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="{{ config('services.midtrans.client_key') }}"></script>
    @endif

    <script>
        document.getElementById('pay-dp-button').addEventListener('click', function () {
            window.snap.pay('{{ $booking->snap_token }}', {
                onSuccess: function (result) {
                    document.getElementById('payment-result').classList.remove('hidden');
                    document.getElementById('result-icon').innerHTML = '<svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>';
                    document.getElementById('result-icon').classList.add('bg-green-100');
                    document.getElementById('result-title').textContent = 'DP Berhasil Dibayar!';
                    document.getElementById('result-message').textContent = 'Menunggu konfirmasi admin.';
                    document.getElementById('result-link').classList.remove('hidden');
                    document.getElementById('pay-dp-button').classList.add('hidden');
                },
                onPending: function (result) {
                    document.getElementById('payment-result').classList.remove('hidden');
                    document.getElementById('result-icon').innerHTML = '<svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>';
                    document.getElementById('result-icon').classList.add('bg-yellow-100');
                    document.getElementById('result-title').textContent = 'Pembayaran Pending';
                    document.getElementById('result-message').textContent = 'Silakan selesaikan pembayaran Anda.';
                    document.getElementById('pay-dp-button').classList.add('hidden');
                },
                onError: function (result) {
                    document.getElementById('payment-result').classList.remove('hidden');
                    document.getElementById('result-icon').innerHTML = '<svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>';
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
