@extends('layouts.guest')
@section('title', '403 - Access Denied')

@section('content')
<div class="min-h-[calc(100vh-130px)] flex items-center justify-center bg-[#F2F2F2] px-4">
    <div class="text-center max-w-md">
        
        <div class="mx-auto w-32 h-32 bg-red-100 rounded-full flex items-center justify-center mb-6">
            <svg class="w-16 h-16 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
        </div>

        <h1 class="text-6xl font-extrabold text-[#012619] mb-4">403</h1>
        <h2 class="text-2xl font-bold text-gray-800 mb-2">Access Denied!</h2>
        <p class="text-gray-500 mb-8">You do not have the required permissions to view this page. If you think this is a mistake, contact your administrator.</p>
        
        <button onclick="window.history.back()" class="bg-[#30BF62] text-white hover:bg-[#188C4A] px-8 py-3 rounded-xl font-bold transition duration-200 shadow-md inline-flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
            Go back
        </button>

    </div>
</div>
@endsection
