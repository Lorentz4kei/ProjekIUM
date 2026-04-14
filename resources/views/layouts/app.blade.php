<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Kos Management Dashboard')</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Style tweaks -->
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #F2F2F2; color: #1a1a1a; }
        /* Alpine cloak to prevent flicker */
        [x-cloak] { display: none !important; }
    </style>
    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.0/dist/cdn.min.js"></script>
</head>
<body class="antialiased font-sans bg-[#F2F2F2] text-[#1a1a1a]" x-data="{ sidebarOpen: false }">
    <div class="flex h-screen overflow-hidden">
        
        <!-- Sidebar -->
        @include('partials.sidebar')

        <!-- Main Content Wrapper -->
        <div class="relative flex flex-col flex-1 overflow-y-auto overflow-x-hidden">
            
            <!-- Top Navbar -->
            @include('partials.navbar')

            <!-- Main Content Area -->
            <main class="w-full grow p-6">
                <!-- Wrapper for max width on large screens -->
                <div class="max-w-7xl mx-auto">
                    @include('partials.alerts')
                    @yield('content')
                </div>
            </main>
            
        </div>
    </div>
</body>
</html>
