@extends('layouts.admin')

@section('title', 'Kelola Produk')

@section('content')
<div class="container mx-auto px-4 py-8">
    {{-- Header Halaman --}}
    <div class="flex flex-col sm:flex-row justify-between items-center gap-4 mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Kelola Produk</h1>
            <p class="text-gray-600 mt-2">Pantau dan kelola semua produk Anda dengan mudah.</p>
        </div>
        <div class="flex items-center gap-3">
            {{-- Search Bar --}}
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </span>
                <input type="text" placeholder="Cari produk..." class="w-full sm:w-72 pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200" aria-label="Cari produk">
            </div>
            {{-- Tombol Tambah Produk --}}
            <button onclick="openModal('createModal')" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2.5 px-5 rounded-lg flex items-center shadow-md transition-transform transform hover:scale-105 duration-200" aria-label="Tambah produk baru">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Tambah Produk
            </button>
        </div>
    </div>

    {{-- Container untuk Tabel --}}
    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-600">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-4">Nama Produk</th>
                        <th scope="col" class="px-6 py-4">Harga</th>
                        <th scope="col" class="px-6 py-4">Stok</th>
                        <th scope="col" class="px-6 py-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b hover:bg-gray-50 transition-colors duration-200">
                        <td class="px-6 py-4">
                            <div class="font-semibold text-gray-800">Laptop Pro X1</div>
                            <div class="text-xs text-gray-500">SKU: LPX-001</div>
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-700">Rp 15.000.000</td>
                        <td class="px-6 py-4 font-medium text-gray-700">25</td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex items-center justify-center gap-2">
                                <button onclick="openModal('editModal')" class="p-2 text-blue-600 bg-blue-100 hover:bg-blue-200 rounded-lg transition-colors duration-200" title="Edit produk" aria-label="Edit Laptop Pro X1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                        <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <button class="p-2 text-red-600 bg-red-100 hover:bg-red-200 rounded-lg transition-colors duration-200" title="Hapus produk" aria-label="Hapus Laptop Pro X1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr class="bg-white border-b hover:bg-gray-50 transition-colors duration-200">
                        <td class="px-6 py-4">
                            <div class="font-semibold text-gray-800">Kaos Katun Premium</div>
                            <div class="text-xs text-gray-500">SKU: KKP-002</div>
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-700">Rp 150.000</td>
                        <td class="px-6 py-4 font-medium text-gray-700">120</td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex items-center justify-center gap-2">
                                <button onclick="openModal('editModal')" class="p-2 text-blue-600 bg-blue-100 hover:bg-blue-200 rounded-lg transition-colors duration-200" title="Edit produk" aria-label="Edit Kaos Katun Premium">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                        <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <button class="p-2 text-red-600 bg-red-100 hover:bg-red-200 rounded-lg transition-colors duration-200" title="Hapus produk" aria-label="Hapus Kaos Katun Premium">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    {{-- Memasukkan kode modal dari file lain --}}
    @include('Admin.Product.create')
    @include('Admin.Product.edit')
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
            closeModal('createModal');
            closeModal('editModal');
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