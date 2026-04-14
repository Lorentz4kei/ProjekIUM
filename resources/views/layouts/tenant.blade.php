<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Tenant Portal')</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #F2F2F2; color: #1a1a1a; }
        [x-cloak] { display: none !important; }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.0/dist/cdn.min.js"></script>
</head>
<body class="antialiased font-sans bg-[#F2F2F2] text-[#1a1a1a] flex flex-col min-h-screen">
    
    <!-- Tenant Top Navbar -->
    @include('partials.navbar', ['isTenant' => true])

    <!-- Main Content Area -->
    <main class="flex-grow w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        @include('partials.alerts')
        @yield('content')
    </main>

    <!-- Simple Footer -->
    @include('partials.footer')
</body>
</html>
