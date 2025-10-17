@extends('layouts.admin')

@section('title', 'Kelola Toko')

@section('content')
<div class="container mx-auto px-4 py-8">
    {{-- Header Halaman --}}
    <div class="flex flex-col sm:flex-row justify-between items-center gap-4 mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Kelola Toko</h1>
            <p class="text-gray-600 mt-2">Pantau dan kelola semua toko yang terdaftar di sistem Anda.</p>
        </div>
        <div class="flex items-center gap-3">
            {{-- Search Bar --}}
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </span>
                <input type="text" placeholder="Cari toko..." class="w-full sm:w-72 pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200" aria-label="Cari toko">
            </div>
        </div>
    </div>

    {{-- Container untuk Tabel --}}
    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-600">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-4">Nama Pemilik</th>
                        <th scope="col" class="px-6 py-4">Nama Toko</th>
                        <th scope="col" class="px-6 py-4">Alamat Toko</th>
                        <th scope="col" class="px-6 py-4">No HP</th>
                        <th scope="col" class="px-6 py-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b hover:bg-gray-50 transition-colors duration-200">
                        <td class="px-6 py-4 font-semibold text-gray-800">Ahmad Yani</td>
                        <td class="px-6 py-4 font-medium text-gray-700">Toko Elektronik Jaya</td>
                        <td class="px-6 py-4 font-medium text-gray-700">Jl. Merdeka No. 123, Jakarta</td>
                        <td class="px-6 py-4 font-medium text-gray-700">+6281234567890</td>
                        <td class="px-6 py-4 text-center">
                            <button class="p-2 text-blue-600 bg-blue-100 hover:bg-blue-200 rounded-lg transition-colors duration-200" title="Lihat detail toko" aria-label="Lihat detail toko Ahmad Yani">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                    <tr class="bg-white border-b hover:bg-gray-50 transition-colors duration-200">
                        <td class="px-6 py-4 font-semibold text-gray-800">Siti Aisyah</td>
                        <td class="px-6 py-4 font-medium text-gray-700">Toko Fashion Modern</td>
                        <td class="px-6 py-4 font-medium text-gray-700">Jl. Sudirman No. 45, Bandung</td>
                        <td class="px-6 py-4 font-medium text-gray-700">+6289876543210</td>
                        <td class="px-6 py-4 text-center">
                            <button class="p-2 text-blue-600 bg-blue-100 hover:bg-blue-200 rounded-lg transition-colors duration-200" title="Lihat detail toko" aria-label="Lihat detail toko Siti Aisyah">
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
</div>

@endsection

@push('scripts')
<script>
    // Placeholder untuk aksi detail jika modal diperlukan nanti
    function openModal(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            const modalContent = modal.querySelector('div');
            modal.classList.remove('hidden');
            document.body.classList.add('overflow-y-hidden');
            setTimeout(() => {
                modal.classList.remove('opacity-0');
                modalContent.classList.remove('scale-95');
            }, 10);
        }
    }

    function closeModal(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            const modalContent = modal.querySelector('div');
            modal.classList.add('opacity-0');
            modalContent.classList.add('scale-95');
            setTimeout(() => {
                modal.classList.add('hidden');
                document.body.classList.remove('overflow-y-hidden');
            }, 300);
        }
    }

    document.addEventListener('keydown', function(event) {
        if (event.key === "Escape") {
            closeModal('detailModal');
        }
    });
</script>
@endpush