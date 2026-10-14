<!DOCTYPE html>
<html lang="id" class="h-full scroll-smooth">
<head>
    @include('layout.head')
</head>
<body class="bg-[#FBFBFB] text-slate-800 min-h-screen flex flex-col font-sans antialiased" x-data="{ mobileMenuOpen: false, searchOpen: false }">

    {{-- Main Navbar & Announcement Bar --}}
    @include('layout.navbar')

    {{-- Main Content Injection --}}
    <main class="flex-grow">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('layout.footer')

    @stack('scripts')
</body>
</html>
