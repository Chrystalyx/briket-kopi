@extends('layouts.admin')

@section('title', 'Kelola Transaksi')

@section('content')
<div class="container mx-auto px-4 py-8">
    {{-- Header Halaman --}}
    <div class="flex flex-col sm:flex-row justify-between items-center gap-4 mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Kelola Transaksi</h1>
            <p class="text-gray-600 mt-2">Pantau dan kelola semua transaksi di toko Anda dengan mudah.</p>
        </div>
        <div class="flex items-center gap-3">
            {{-- Search Bar --}}
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </span>
                <input type="text" placeholder="Cari transaksi..." class="w-full sm:w-72 pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200" aria-label="Cari transaksi">
            </div>
        </div>
    </div>

    {{-- Container untuk Tabel --}}
    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-600">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-4">Nama User</th>
                        <th scope="col" class="px-6 py-4">Grand Total</th>
                        <th scope="col" class="px-6 py-4">Tanggal Transaksi</th>
                        <th scope="col" class="px-6 py-4">Status Pembayaran</th>
                        <th scope="col" class="px-6 py-4">Quantity</th>
                        <th scope="col" class="px-6 py-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b hover:bg-gray-50 transition-colors duration-200">
                        <td class="px-6 py-4 font-semibold text-gray-800">John Doe</td>
                        <td class="px-6 py-4 font-medium text-gray-700">Rp 15.150.000</td>
                        <td class="px-6 py-4 font-medium text-gray-700">2025-10-15</td>
                        <td class="px-6 py-4">
                            <span class="inline-block px-2 py-1 text-xs font-medium text-green-700 bg-green-100 rounded-full">Lunas</span>
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-700">2</td>
                        <td class="px-6 py-4 text-center">
                            <button onclick="openModal('detailModal')" class="p-2 text-blue-600 bg-blue-100 hover:bg-blue-200 rounded-lg transition-colors duration-200" title="Lihat detail transaksi" aria-label="Lihat detail transaksi John Doe">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                    <tr class="bg-white border-b hover:bg-gray-50 transition-colors duration-200">
                        <td class="px-6 py-4 font-semibold text-gray-800">Jane Smith</td>
                        <td class="px-6 py-4 font-medium text-gray-700">Rp 300.000</td>
                        <td class="px-6 py-4 font-medium text-gray-700">2025-10-14</td>
                        <td class="px-6 py-4">
                            <span class="inline-block px-2 py-1 text-xs font-medium text-yellow-700 bg-yellow-100 rounded-full">Pending</span>
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-700">3</td>
                        <td class="px-6 py-4 text-center">
                            <button onclick="openModal('detailModal')" class="p-2 text-blue-600 bg-blue-100 hover:bg-blue-200 rounded-lg transition-colors duration-200" title="Lihat detail transaksi" aria-label="Lihat detail transaksi Jane Smith">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    {{-- Memasukkan kode modal detail dari file lain --}}
    @include('Admin.Transaction.detail')
</div>

@endsection

@push('scripts')
<script>
    function openModal(modalId) {
        const modal = document.getElementById(modalId);
        const modalContent = modal.querySelector('div');
        modal.classList.remove('hidden');
        document.body.classList.add('overflow-y-hidden');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            modalContent.classList.remove('scale-95');
        }, 10);
    }

    function closeModal(modalId) {
        const modal = document.getElementById(modalId);
        const modalContent = modal.querySelector('div');
        modal.classList.add('opacity-0');
        modalContent.classList.add('scale-95');
        setTimeout(() => {
            modal.classList.add('hidden');
            document.body.classList.remove('overflow-y-hidden');
        }, 300);
    }

    document.addEventListener('keydown', function(event) {
        if (event.key === "Escape") {
            closeModal('detailModal');
        }
    });

    document.querySelectorAll('[id$="Modal"]').forEach(modal => {
        modal.addEventListener('click', function(event) {
            if (event.target === modal) {
                closeModal(modal.id);
            }
        });
    });
</script>
@endpush