<div id="detailModal" class="fixed inset-0 bg-black bg-opacity-10 backdrop-blur-md hidden flex items-center justify-center z-50 p-4 transition-opacity duration-300 opacity-0" aria-labelledby="detailModalTitle" role="dialog">
    <div class="bg-white rounded-xl shadow-2xl p-6 sm:p-8 w-full max-w-md transform transition-transform duration-300 scale-95">
        <div class="flex justify-between items-center border-b border-gray-200 pb-4 mb-6">
            <h2 id="detailModalTitle" class="text-2xl font-bold text-gray-900">Detail Transaksi</h2>
            <button onclick="closeModal('detailModal')" class="w-8 h-8 flex items-center justify-center rounded-full text-gray-500 hover:bg-gray-100 hover:text-gray-800 transition-colors duration-200" aria-label="Tutup modal">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <div class="space-y-6">
            <div>
                <label class="block text-sm font-medium text-gray-700">Nama User</label>
                <p class="mt-1 text-gray-800 font-semibold">John Doe</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Grand Total</label>
                <p class="mt-1 text-gray-800 font-semibold">Rp 15.150.000</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Tanggal Transaksi</label>
                <p class="mt-1 text-gray-800 font-semibold">2025-10-15</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Status Pembayaran</label>
                <p class="mt-1 text-green-700 font-semibold">Lunas</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Metode Pembayaran</label>
                <p class="mt-1 text-gray-800 font-semibold">Transfer Bank</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Quantity</label>
                <p class="mt-1 text-gray-800 font-semibold">2</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Harga Saat Transaksi</label>
                <p class="mt-1 text-gray-800 font-semibold">Rp 7.500.000</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Subtotal</label>
                <p class="mt-1 text-gray-800 font-semibold">Rp 15.000.000</p>
            </div>
        </div>
        <div class="flex justify-end items-center mt-8 pt-4 border-t border-gray-200">
            <button type="button" onclick="closeModal('detailModal')" class="bg-gray-100 hover:bg-gray-200 text-gray-800 font-medium py-2.5 px-5 rounded-lg transition-colors duration-200">Tutup</button>
        </div>
    </div>
</div>