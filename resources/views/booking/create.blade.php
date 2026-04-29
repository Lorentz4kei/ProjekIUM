@extends('layouts.guest')
@use('Illuminate\Support\Facades\Storage')
@section('title', 'Book Room - e-Kost')

@section('content')
    <div class="bg-[#F2F2F2] min-h-[calc(100vh-64px)] py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Stepper -->
            <div class="mb-10">
                <h1 class="text-2xl font-bold text-[#012619] mb-6">Complete Your Booking</h1>
                <div class="flex items-center text-sm font-medium">
                    <div class="flex items-center text-[#30BF62]">
                        <span class="w-8 h-8 flex items-center justify-center bg-[#30BF62] text-white rounded-full font-bold shadow-sm">1</span>
                        <span class="ml-2 hidden sm:block">Personal Info</span>
                    </div>
                    <div class="flex-1 mx-4 h-0.5 bg-gray-200"><div class="w-1/2 h-full bg-[#30BF62]"></div></div>
                    <div class="flex items-center text-gray-400">
                        <span class="w-8 h-8 flex items-center justify-center bg-white border-2 border-gray-300 rounded-full font-bold">2</span>
                        <span class="ml-2 hidden sm:block">Payment DP</span>
                    </div>
                    <div class="flex-1 mx-4 h-0.5 bg-gray-200"></div>
                    <div class="flex items-center text-gray-400">
                        <span class="w-8 h-8 flex items-center justify-center bg-white border-2 border-gray-300 rounded-full font-bold">3</span>
                        <span class="ml-2 hidden sm:block">Confirmation</span>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Form Area -->
                <div class="md:col-span-2">
                    <div class="bg-white rounded-2xl shadow-md p-6 sm:p-8">
                        <h2 class="text-lg font-bold text-[#012619] mb-6 pb-2 border-b border-gray-100">Tenant Information</h2>

                        <form action="{{ route('booking.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                            @csrf
                            <input type="hidden" name="room_id" value="{{ $room->id }}">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                                <input type="text" value="{{ Auth::user()->name }}"
                                    class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-[#30BF62] focus:border-[#30BF62] bg-gray-50"
                                    readonly>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Start Date</label>
                                <input type="date" name="start_date" value="{{ old('start_date') }}" min="{{ date('Y-m-d') }}"
                                    class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-[#30BF62] focus:border-[#30BF62]"
                                    required>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Duration</label>
                                <select name="duration"
                                    class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-[#30BF62] focus:border-[#30BF62]">
                                    <option value="1" {{ old('duration') == 1 ? 'selected' : '' }}>1 Month</option>
                                    <option value="3" {{ old('duration') == 3 ? 'selected' : '' }}>3 Months</option>
                                    <option value="6" {{ old('duration') == 6 ? 'selected' : '' }}>6 Months</option>
                                    <option value="12" {{ old('duration') == 12 ? 'selected' : '' }}>12 Months</option>
                                </select>
                            </div>

                            <div class="mt-6 flex justify-end">
                                <button type="submit"
                                    class="bg-[#30BF62] text-white hover:bg-[#188C4A] px-8 py-3 rounded-xl font-bold transition duration-200 shadow-md">
                                    Continue to Payment
                                </button>
                            </div>
                        </form>
                        </div>
                </div>

                <!-- Order Summary Sidebar -->
                <div class="md:col-span-1">
                    <div class="bg-white rounded-2xl shadow-md p-6 sticky top-6">
                        <h2 class="text-lg font-bold text-[#012619] mb-4 pb-2 border-b border-gray-100">Booking Summary</h2>

                        <div class="flex gap-4 mb-4">
                            @if($room->photo)
                                <img src="{{ Storage::url($room->photo) }}" class="w-16 h-16 rounded-xl object-cover">
                            @else
                                <img src="https://placehold.co/100x100/e2e8f0/475569?text=Room" class="w-16 h-16 rounded-xl object-cover">
                            @endif
                            <div>
                                <h3 class="font-bold text-[#012619] text-sm">{{ $room->type }} Room {{ $room->room_number }}</h3>
                                <p class="text-xs text-gray-500">{{ $room->type }}</p>
                            </div>
                        </div>

                        <div class="space-y-3 text-sm text-gray-600 border-t border-gray-100 pt-4">
                            <div class="flex justify-between">
                                <span>Monthly Rent</span>
                                <span class="font-medium text-gray-900">Rp {{ number_format($room->price, 0, ',', '.') }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span>DP (50%)</span>
                                <span class="font-medium text-gray-900">Rp {{ number_format($room->price * 0.5, 0, ',', '.') }}</span>
                            </div>
                        </div>

                        <div class="border-t border-gray-200 mt-4 pt-4 flex justify-between items-center text-[#012619]">
                            <span class="font-bold">Total DP</span>
                            <span class="text-xl font-extrabold text-[#30BF62]">Rp {{ number_format($room->price * 0.5, 0, ',', '.') }}</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
