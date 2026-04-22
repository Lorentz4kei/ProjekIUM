@extends('layouts.guest')
@section('title', 'Forgot Password - e-Kost')

@section('content')
<div class="min-h-[calc(100vh-64px)] flex items-center justify-center bg-[#F2F2F2] py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full bg-white rounded-2xl shadow-md p-8 text-center">
        
        <div class="mx-auto w-16 h-16 bg-green-50 text-[#30BF62] rounded-full flex items-center justify-center mb-6">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" /></svg>
        </div>

        <h2 class="text-2xl font-bold text-[#012619] mb-2">Forgot Password?</h2>
        <p class="text-gray-500 text-sm mb-8">No worries, we'll send you reset instructions. Enter the email associated with your account.</p>

        <form action="#" method="POST" class="space-y-6 text-left">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                <input type="email" placeholder="name@example.com" class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-2 focus:ring-[#30BF62] focus:border-transparent transition" required>
            </div>
            
            <button type="button" class="w-full bg-[#30BF62] text-white hover:bg-[#188C4A] rounded-xl px-4 py-2 font-semibold transition duration-200">
                Send Reset Link
            </button>
        </form>

        <div class="mt-6 flex items-center justify-center text-sm font-medium">
            <a href="{{ route('login') }}" class="text-gray-500 hover:text-[#012619] transition flex items-center">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
                Back to login
            </a>
        </div>
    </div>
</div>
@endsection
