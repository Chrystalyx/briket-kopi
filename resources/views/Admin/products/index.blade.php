@extends('layouts.admin')

@section('title', 'Kelola Produk')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="flex flex-col sm:flex-row justify-between items-center gap-4 mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Kelola Produk</h1>
                <p class="text-gray-600 mt-2">Pantau dan kelola semua produk Anda.</p>
            </div>
            <button onclick="openModal('createModal')"
                class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2.5 px-5 rounded-lg flex items-center shadow-md transition-transform transform hover:scale-105 duration-200">
                <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Tambah Produk
            </button>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                <p>{{ session('success') }}</p>
            </div>
        @endif

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
                        @forelse ($products as $product)
                            <tr class="bg-white border-b hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-6 py-4 font-semibold text-gray-800">{{ $product->nama }}</td>
                                <td class="px-6 py-4">Rp{{ number_format($product->harga, 0, ',', '.') }}</td>
                                <td class="px-6 py-4">{{ $product->quantity }}</td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <button onclick="editProduct({{ $product->id }})"
                                            class="p-2 text-blue-600 bg-blue-100 hover:bg-blue-200 rounded-lg"
                                            title="Edit produk">
                                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path
                                                    d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                <path fill-rule="evenodd"
                                                    d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="p-2 text-red-600 bg-red-100 hover:bg-red-200 rounded-lg"
                                                title="Hapus produk">
                                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center px-6 py-4">Tidak ada produk ditemukan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="p-4">
                {{ $products->links() }}
            </div>
        </div>
    </div>

    @include('admin.products.create')
    @include('admin.products.edit')
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

        async function editProduct(id) {
            try {
                const response = await fetch(`/admin/products/${id}`);
                if (!response.ok) throw new Error('Gagal mengambil data produk.');
                const product = await response.json();

                const form = document.getElementById('editForm');
                form.action = `/admin/products/${id}`;
                document.getElementById('product_name_edit').value = product.nama;
                document.getElementById('price_edit').value = product.harga;
                document.getElementById('stock_edit').value = product.quantity;
                document.getElementById('jenis_edit').value = product.jenis;
                document.getElementById('description_edit').value = product.description;

                openModal('editModal');
            } catch (error) {
                console.error(error);
                alert(error.message);
            }
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
