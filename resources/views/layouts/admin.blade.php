<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-slate-100 text-slate-800">

    <div class="flex h-screen bg-slate-100">

        <aside class="w-64 bg-white shadow-lg flex flex-col transition-all duration-300">
            <div class="p-5 flex items-center gap-3 border-b border-slate-200">
                <div class="p-2 bg-indigo-600 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" />
                    </svg>
                </div>
                <span class="text-xl font-bold text-slate-800">BRIKO</span>
            </div>

            <nav class="flex-1 px-4 py-4 space-y-2">
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center group px-4 py-2.5 rounded-lg transition-colors duration-200
       {{ request()->routeIs('admin.dashboard')
           ? 'text-indigo-700 bg-indigo-100'
           : 'text-slate-600 hover:bg-indigo-50 hover:text-indigo-600' }}">

                    <svg class="h-6 w-6 mr-3 {{ request()->routeIs('admin.dashboard') ? 'text-indigo-500' : 'text-slate-400 group-hover:text-indigo-500' }}"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span class="font-medium">Dashboard</span>
                </a>

                <a href="{{ route('admin.products.index') }}"
                    class="flex items-center group px-4 py-2.5 rounded-lg transition-colors duration-200
       {{ request()->routeIs('admin.products.*')
           ? 'text-indigo-700 bg-indigo-100'
           : 'text-slate-600 hover:bg-indigo-50 hover:text-indigo-600' }}">

                    <svg class="h-6 w-6 mr-3 {{ request()->routeIs('admin.products.*') ? 'text-indigo-500' : 'text-slate-400 group-hover:text-indigo-500' }}"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                    </svg>
                    <span class="font-medium">Kelola Produk</span>
                </a>

                {{-- <a href="#" class="flex items-center group px-4 py-2.5 text-slate-600 hover:bg-indigo-50 hover:text-indigo-600 rounded-lg"> --}}
                {{-- SVG icon --}}
                {{-- <span class="font-medium">Kelola Toko</span> --}}
                {{-- </a> --}}

                <a href="{{ route('admin.transactions.index') }}"
                    class="flex items-center justify-between group px-4 py-2.5 rounded-lg transition-colors duration-200
       {{ request()->routeIs('admin.transactions.*')
           ? 'text-indigo-700 bg-indigo-100'
           : 'text-slate-600 hover:bg-indigo-50 hover:text-indigo-600' }}">

                    <div class="flex items-center">
                        <svg class="h-6 w-6 mr-3 {{ request()->routeIs('admin.transactions.*') ? 'text-indigo-500' : 'text-slate-400 group-hover:text-indigo-500' }}"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                        </svg>
                        <span class="font-medium">Kelola Transaksi</span>
                    </div>
                    {{-- <span class="text-xs font-semibold text-white bg-green-500 rounded-full px-2 py-0.5">2</span> --}}
                </a>
            </nav>

            <div class="p-4 mt-auto border-t border-slate-200">
                <div class="flex items-center">
                    <img class="w-10 h-10 rounded-full" src="https://i.pravatar.cc/150?u=emily" alt="User Avatar">
                    <div class="ml-3">
                        <span class="font-semibold text-sm">Emily Jonson</span>
                        <span class="block text-xs text-slate-500">jonson@bress.com</span>
                    </div>
                </div>
            </div>
        </aside>

        <div class="flex-1 flex flex-col">
            <header class="bg-white shadow-sm p-4 border-b border-slate-200">
                <div class="flex items-center justify-between">
                    <div class="relative w-1/3">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </span>
                        <input type="text" placeholder="Search anything..."
                            class="w-full pl-10 pr-4 py-2 border border-slate-200 rounded-full bg-slate-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:bg-white">
                    </div>

                    <div class="flex items-center space-x-6">
                        <div class="w-px h-6 bg-slate-200"></div>
                        <img class="w-10 h-10 rounded-full" src="https://i.pravatar.cc/150?u=emily" alt="User Avatar">
                    </div>
                </div>
            </header>

            <main class="flex-1 p-6 lg:p-8 overflow-y-auto">
                @yield('content')
            </main>
        </div>
    </div>
    @stack('scripts')
</body>

</html>
