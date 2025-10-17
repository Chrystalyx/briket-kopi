<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Briko')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest/dist/lucide.min.js"></script>
    
    <style>
        body {
            background-image: url("{{ asset('images/background_sign.jpg') }}");
            background-size: cover;
            background-position: center;
            background-attachment: fixed; 

            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #532E1C;
            padding-top: 76px; 
        }
        
        /* Navbar Styles */
        .navbar {
            background-color: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid #E6E6E6; 
        }
        .logo-icon {
            background-color: #C5A880; 
            color: #0F0F0F; 
            width: 36px; height: 36px;
            border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
            transition: all 0.3s ease;
        }
        .logo-text { color: #532E1C; font-size: 22px; font-weight: 700; }
        .logo-container:hover .logo-icon {
            transform: scale(1.1) rotate(10deg);
        }

        .nav-link {
            position: relative; transition: all 0.3s ease;
            font-weight: 500; color: #532E1C; 
            padding: 8px 4px;
        }
        .nav-link::after {
            content: ''; position: absolute; bottom: 0; left: 0;
            width: 0; height: 2px;
            background-color: #C5A880; 
            transition: width 0.3s ease;
        }
        .nav-link:hover, .nav-link.active {
            color: #0F0F0F; 
        }
        .nav-link:hover::after, .nav-link.active::after { width: 100%; }
        
        /* Button Styles */
        .btn-primary { background-color: #C5A880; color: #0F0F0F; font-weight: 600; transition: all 0.3s ease; box-shadow: 0 4px 15px rgba(0,0,0, 0.05); }
        .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 6px 20px rgba(197, 168, 128, 0.4); }
        .btn-secondary { background-color: transparent; color: #532E1C; border: 2px solid #C5A880; font-weight: 600; transition: all 0.3s ease; }
        .btn-secondary:hover { background-color: #C5A880; color: #0F0F0F; transform: translateY(-2px); }

        /* Mobile Menu */
        .mobile-menu { transform: translateX(100%); transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1); }
        .mobile-menu.open { transform: translateX(0); }
        .nav-overlay { background: rgba(0, 0, 0, 0.5); opacity: 0; pointer-events: none; transition: opacity 0.3s ease; z-index: 40; }
        .nav-overlay.active { opacity: 1; pointer-events: auto; }

        main {
            display: flex;
            flex-direction: column;
            min-height: calc(100vh - 76px);
        }
    </style>

    @yield('style')

</head>
<body>
    <nav class="navbar fixed w-full z-50 top-0 left-0">
        <div class="container mx-auto px-4 py-4 flex items-center justify-between">
            <a href="/" class="logo-container flex items-center gap-3">
                <div class="logo-icon">
                    <i data-lucide="brick" class="w-5 h-5"></i>
                </div>
                <span class="logo-text">Briko</span>
            </a>

            <div class="hidden md:flex space-x-6 lg:space-x-8">
                <a href="/#home" class="nav-link active">Home</a>
                <a href="/#products" class="nav-link">Beli Briket</a>
                <a href="/#sell" class="nav-link">Mulai Jual</a>
                <a href="/#history" class="nav-link">Riwayat Pembelian</a>
            </div>

            <div class="hidden md:flex space-x-4">
                <a href="{{ route('login') }}" class="btn-secondary py-2 px-6 rounded-lg">Login</a>
                <a href="{{ route('register') }}" class="btn-primary py-2 px-6 rounded-lg">Register</a>
            </div>

            <button id="hamburger" class="md:hidden text-[#532E1C] focus:outline-none">
                <i data-lucide="menu" class="w-6 h-6"></i>
            </button>
        </div>

        <div id="nav-overlay" class="nav-overlay fixed inset-0"></div>

        <div id="mobile-menu" class="md:hidden bg-white/95 backdrop-filter backdrop-blur-lg mobile-menu fixed top-0 right-0 h-full w-3/4 sm:w-1/2 z-50 p-6 shadow-xl">
            <div class="flex justify-between items-center mb-8">
                <span class="logo-text">Menu</span>
                <button id="close-menu" class="text-[#532E1C] focus:outline-none">
                    <i data-lucide="x" class="w-6 h-6"></i>
                </button>
            </div>
            <div class="flex flex-col space-y-4">
                <a href="/#home" class="nav-link py-3 px-4 rounded-lg hover:bg-gray-100 active">Home</a>
                <a href="/#products" class="nav-link py-3 px-4 rounded-lg hover:bg-gray-100">Beli Briket</a>
                <a href="/#sell" class="nav-link py-3 px-4 rounded-lg hover:bg-gray-100">Mulai Jual</a>
                <a href="/#history" class="nav-link py-3 px-4 rounded-lg hover:bg-gray-100">Riwayat Pembelian</a>
                <div class="border-t border-[#E6E6E6] pt-4 space-y-3">
                    <a href="{{ route('login') }}" class="btn-secondary py-3 px-4 rounded-lg text-center block">Login</a>
                    <a href="{{ route('register') }}" class="btn-primary py-3 px-4 rounded-lg text-center block">Register</a>
                </div>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <script>
        const hamburger = document.getElementById('hamburger');
        const mobileMenu = document.getElementById('mobile-menu');
        const closeMenu = document.getElementById('close-menu');
        const navOverlay = document.getElementById('nav-overlay');
        function openMenu() { mobileMenu.classList.add('open'); navOverlay.classList.add('active'); }
        function closeMenuHandler() { mobileMenu.classList.remove('open'); navOverlay.classList.remove('active'); }
        hamburger.addEventListener('click', openMenu);
        closeMenu.addEventListener('click', closeMenuHandler);
        navOverlay.addEventListener('click', closeMenuHandler);
    </script>
    <script>
        lucide.createIcons();
    </script>
    @stack('scripts')
</body>
</html>