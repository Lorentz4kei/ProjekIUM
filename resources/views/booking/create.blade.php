@extends('layouts.guest')
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
                    
                    <form class="space-y-5">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                                <input type="text" value="John" class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-[#30BF62] focus:border-[#30BF62] bg-gray-50" readonly>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
                                <input type="text" value="Doe" class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-[#30BF62] focus:border-[#30BF62] bg-gray-50" readonly>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">KTP / ID Number</label>
                            <input type="text" placeholder="16 digits ID Number" class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-[#30BF62] focus:border-[#30BF62]" required>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Upload KTP Photo</label>
                            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-xl hover:border-[#30BF62] transition bg-gray-50 cursor-pointer">
                                <div class="space-y-1 text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <div class="flex text-sm text-gray-600 justify-center">
                                        <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-[#188C4A] hover:text-[#035949] focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-[#30BF62]">
                                            <span>Upload a file</span>
                                            <input id="file-upload" name="file-upload" type="file" class="sr-only">
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs text-gray-500">PNG, JPG, up to 2MB</p>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Emergency Contact</label>
                            <input type="tel" placeholder="Parent/Guardian Phone" class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-[#30BF62] focus:border-[#30BF62]" required>
                        </div>
                    </form>
                </div>
                
                <div class="mt-6 flex justify-end">
                    <button type="button" onclick="window.location.href='{{ route('booking.upload-dp') }}'" class="bg-[#30BF62] text-white hover:bg-[#188C4A] px-8 py-3 rounded-xl font-bold transition duration-200 shadow-md">
                        Continue to Payment
                    </button>
                </div>
            </div>

            <!-- Order Summary Sidebar -->
            <div class="md:col-span-1">
                <div class="bg-white rounded-2xl shadow-md p-6 sticky top-6">
                    <h2 class="text-lg font-bold text-[#012619] mb-4 pb-2 border-b border-gray-100">Booking Summary</h2>
                    
                    <div class="flex gap-4 mb-4">
                        <img src="https://placehold.co/100x100/e2e8f0/475569?text=VIP" class="w-16 h-16 rounded-xl object-cover">
                        <div>
                            <h3 class="font-bold text-[#012619] text-sm">VIP Room Suite</h3>
                            <p class="text-xs text-gray-500">Duration: 1 Month</p>
                        </div>
                    </div>

                    <div class="space-y-3 text-sm text-gray-600 border-t border-gray-100 pt-4">
                        <div class="flex justify-between">
                            <span>Monthly Rent</span>
                            <span class="font-medium text-gray-900">Rp 2,500,000</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Platform Fee</span>
                            <span class="font-medium text-gray-900">Rp 15,000</span>
                        </div>
                    </div>

                    <div class="border-t border-gray-200 mt-4 pt-4 flex justify-between items-center text-[#012619]">
                        <span class="font-bold">Total Request</span>
                        <span class="text-xl font-extrabold text-[#30BF62]">Rp 2,515,000</span>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
