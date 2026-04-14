@extends('layouts.guest')
@section('title', '404 - Page Not Found')

@section('content')
<div class="min-h-[calc(100vh-130px)] flex items-center justify-center bg-[#F2F2F2] px-4">
    <div class="text-center max-w-md">
        
        <div class="mx-auto w-32 h-32 bg-green-100 rounded-full flex items-center justify-center mb-6">
            <svg class="w-16 h-16 text-[#30BF62]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
        </div>

        <h1 class="text-6xl font-extrabold text-[#012619] mb-4">404</h1>
        <h2 class="text-2xl font-bold text-gray-800 mb-2">Oops! Page not found</h2>
        <p class="text-gray-500 mb-8">The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.</p>
        
        <button onclick="window.history.back()" class="bg-[#30BF62] text-white hover:bg-[#188C4A] px-8 py-3 rounded-xl font-bold transition duration-200 shadow-md inline-flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
            Take me back
        </button>

    </div>
</div>
@endsection
