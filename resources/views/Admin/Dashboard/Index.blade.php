{{-- 1. Memberitahu Blade untuk menggunakan layout dari layouts/admin.blade.php --}}
@extends('layouts.admin')

{{-- 2. (Opsional) Mengatur judul spesifik untuk halaman ini --}}
@section('title', 'Dashboard - Halaman Utama')

{{-- 3. Mendefinisikan konten yang akan dimasukkan ke dalam @yield('content') di layout --}}
@section('content')
    
    {{-- Mulai tulis konten spesifik untuk halaman dashboard di sini --}}

    <h1 class="text-3xl font-bold text-gray-800 mb-4">
        Selamat Datang, Admin!
    </h1>

    <div class="bg-white p-6 rounded-lg shadow-md">
        <p class="text-gray-700">
            Ini adalah halaman utama dashboard Anda. Anda bisa meletakkan ringkasan statistik,
            grafik, atau shortcut penting lainnya di sini.
        </p>
    </div>

    {{-- Contoh lain: grid untuk card statistik --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-6">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold text-gray-600">Total Pengguna</h3>
            <p class="text-3xl font-bold mt-2">1,250</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold text-gray-600">Total Pesanan</h3>
            <p class="text-3xl font-bold mt-2">340</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold text-gray-600">Pendapatan Hari Ini</h3>
            <p class="text-3xl font-bold mt-2">$2,500</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold text-gray-600">Pesan Baru</h3>
            <p class="text-3xl font-bold mt-2">12</p>
        </div>
    </div>

@endsection