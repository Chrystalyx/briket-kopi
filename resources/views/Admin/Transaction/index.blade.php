@extends('layouts.admin')

@section('title', 'Kelola Transaksi')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Kelola Transaksi</h1>
                <p class="text-gray-600 mt-2">Pantau semua transaksi di toko Anda.</p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-600">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-4">Nama User</th>
                            <th scope="col" class="px-6 py-4">Grand Total</th>
                            <th scope="col" class="px-6 py-4">Tanggal</th>
                            <th scope="col" class="px-6 py-4">Status</th>
                            <th scope="col" class="px-6 py-4">Jml. Item</th>
                            <th scope="col" class="px-6 py-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($transactions as $transaction)
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <td class="px-6 py-4 font-semibold">{{ $transaction->user->name ?? 'User Dihapus' }}</td>
                                <td class="px-6 py-4">Rp{{ number_format($transaction->grand_total, 0, ',', '.') }}</td>
                                <td class="px-6 py-4">{{ $transaction->tanggal_transaksi->format('d M Y') }}</td>
                                <td class="px-6 py-4">
                                    <span
                                        class="inline-block px-2 py-1 text-xs font-medium rounded-full 
                                {{ $transaction->status_pembayaran == 'success' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                                        {{ ucfirst($transaction->status_pembayaran) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">{{ $transaction->details->sum('quantity') }}</td>
                                <td class="px-6 py-4 text-center">
                                    <button onclick="showTransactionDetail({{ $transaction->id }})"
                                        class="p-2 text-blue-600 bg-blue-100 hover:bg-blue-200 rounded-lg"
                                        title="Lihat detail">
                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                            stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center px-6 py-4">Tidak ada transaksi ditemukan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="p-4">
                {{ $transactions->links() }}
            </div>
        </div>
    </div>

    @include('admin.transaction.detail')

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

        async function showTransactionDetail(id) {
            try {
                const response = await fetch(`/admin/transactions/${id}`);
                if (!response.ok) throw new Error('Gagal mengambil data transaksi.');
                const trx = await response.json();

                const formatter = new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 0
                });

                document.getElementById('detail_user_name').textContent = trx.user ? trx.user.name : 'User Dihapus';
                document.getElementById('detail_grand_total').textContent = formatter.format(trx.grand_total);
                document.getElementById('detail_tanggal').textContent = new Date(trx.tanggal_transaksi)
                    .toLocaleDateString('id-ID', {
                        day: '2-digit',
                        month: 'long',
                        year: 'numeric'
                    });
                document.getElementById('detail_status').textContent = trx.status_pembayaran.charAt(0).toUpperCase() +
                    trx.status_pembayaran.slice(1);
                document.getElementById('detail_metode').textContent = trx.metode_pembayaran;

                const itemsContainer = document.getElementById('detail_items_container');
                itemsContainer.innerHTML = '';
                trx.details.forEach(item => {
                    const itemHtml = `
                    <div class="flex justify-between items-center py-2 border-b">
                        <div>
                            <p class="font-semibold">${item.product ? item.product.nama : 'Produk Dihapus'}</p>
                            <p class="text-sm text-gray-500">${item.quantity} x ${formatter.format(item.harga_saat_transaksi)}</p>
                        </div>
                        <p class="font-semibold">${formatter.format(item.subtotal)}</p>
                    </div>
                `;
                    itemsContainer.insertAdjacentHTML('beforeend', itemHtml);
                });

                openModal('detailModal');
            } catch (error) {
                console.error(error);
                alert(error.message);
            }
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
