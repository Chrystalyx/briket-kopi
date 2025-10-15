<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 font-sans">

    <div class="flex h-screen">
        
        <aside class="w-64 bg-white shadow-md flex flex-col">
            <div class="p-6 flex items-center justify-center border-b">
                <span class="text-xl font-bold">BRESS</span>
            </div>

            <nav class="flex-1 px-4 py-4 space-y-2">
                <a href="#" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-200 rounded-md">
                    <span class="mr-3">Icon</span>
                    <span>Dashboard</span>
                </a>
                <a href="#" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-200 rounded-md">
                    <span class="mr-3">Icon</span>
                    <span>Projects</span>
                </a>
                <a href="#" class="flex items-center px-4 py-2 bg-gray-800 text-white rounded-md">
                    <span class="mr-3">Icon</span>
                    <span>Task list</span>
                </a>
                <a href="#" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-200 rounded-md">
                    <span class="mr-3">Icon</span>
                    <span>Services</span>
                </a>
                <a href="#" class="flex items-center justify-between px-4 py-2 text-gray-700 hover:bg-gray-200 rounded-md">
                    <div class="flex items-center">
                        <span class="mr-3">Icon</span>
                        <span>Notifications</span>
                    </div>
                    <span class="text-xs font-semibold text-white bg-green-500 rounded-full px-2 py-0.5">2</span>
                </a>
                <a href="#" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-200 rounded-md">
                    <span class="mr-3">Icon</span>
                    <span>Chat</span>
                </a>
            </nav>

            <div class="p-4 border-t">
                <div class="flex flex-col items-center">
                    <img class="w-12 h-12 rounded-full mb-2" src="https://via.placeholder.com/150" alt="User Avatar">
                    <span class="font-semibold">Emily Jonson</span>
                    <span class="text-sm text-gray-500">jonson@bress.com</span>
                </div>
            </div>
        </aside>
        <div class="flex-1 flex flex-col">
            
            <header class="bg-white shadow-sm p-4">
                <div class="flex items-center justify-between">
                    <div class="relative w-1/3">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </span>
                        <input type="text" placeholder="Search" class="w-full pl-10 pr-4 py-2 border rounded-full bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div class="flex items-center space-x-6">
                        <div>
                            <span>Monday, 6th March</span>
                        </div>

                        <div class="flex items-center bg-gray-100 rounded-full p-1">
                            <button class="px-4 py-1 text-sm text-white bg-gray-800 rounded-full">Card</button>
                            <button class="px-4 py-1 text-sm text-gray-600">List</button>
                        </div>
                    </div>
                </div>
            </header>
            <main class="flex-1 p-6 overflow-y-auto">
                @yield('content')
            </main>
        </div>
    </div>

</body>
</html>