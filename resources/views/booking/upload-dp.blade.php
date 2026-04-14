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
            <h1 class="text-2xl font-bold text-[#012619] mt-6">Down Payment Transfer</h1>
            <p class="text-gray-500 mt-2">Secure your room by paying the DP within 24 hours.</p>
        </div>

        <div class="bg-white rounded-2xl shadow-md overflow-hidden">
            <!-- Amount & Bank Info -->
            <div class="p-8 border-b border-gray-100 bg-[#012619] text-white text-center">
                <p class="text-gray-300 mb-1">Total to Transfer (DP 50%)</p>
                <div class="text-4xl font-extrabold text-[#30BF62] mb-6">Rp 1,257,500</div>
                
                <div class="inline-flex bg-[#035949] p-4 rounded-2xl items-center text-left space-x-6 max-w-sm w-full mx-auto">
                    <div class="bg-white p-2 rounded-lg">
                        <img src="https://placehold.co/60x30/FFFFFF/000000?text=BCA" alt="Bank" class="h-8">
                    </div>
                    <div>
                        <p class="text-sm text-gray-300">BCA Account</p>
                        <p class="font-bold text-xl tracking-wider">1234 567 890</p>
                        <p class="text-sm">a.n. e-Kost Management</p>
                    </div>
                </div>
            </div>

            <!-- Upload Form -->
            <div class="p-8">
                <h3 class="text-lg font-bold text-[#012619] mb-4">Upload Transfer Proof</h3>
                
                <div x-data="{ fileName: '' }" class="space-y-4">
                    <div class="flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-xl hover:border-[#30BF62] transition bg-gray-50 relative">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600 justify-center">
                                <label for="proof-upload" class="relative cursor-pointer bg-transparent rounded-md font-medium text-[#188C4A] hover:text-[#035949] focus-within:outline-none">
                                    <span x-text="fileName === '' ? 'Upload a receipt image' : fileName"></span>
                                    <input id="proof-upload" type="file" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" @change="fileName = $event.target.files[0].name">
                                </label>
                            </div>
                            <p class="text-xs text-gray-500" x-show="fileName === ''">JPG, PNG, PDF up to 2MB</p>
                        </div>
                    </div>
                    
                    <button type="button" onclick="window.location.href='/booking/confirmation'" class="w-full bg-[#30BF62] text-white py-3 rounded-xl font-bold hover:bg-[#188C4A] transition shadow-md mt-4">
                        Submit Payment Proof
                    </button>
                    
                    <div class="text-center mt-4">
                        <a href="/booking/create" class="text-sm text-gray-500 hover:text-[#012619]">Cancel or Go Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
