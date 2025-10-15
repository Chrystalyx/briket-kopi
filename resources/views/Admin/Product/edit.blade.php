<div id="editModal" class="fixed inset-0 bg-black bg-opacity-10 backdrop-blur-md hidden flex items-center justify-center z-50 p-4 transition-opacity duration-300 opacity-0" aria-labelledby="editModalTitle" role="dialog">
    <div class="bg-white rounded-xl shadow-2xl p-6 sm:p-8 w-full max-w-md transform transition-transform duration-300 scale-95">
        <div class="flex justify-between items-center border-b border-gray-200 pb-4 mb-6">
            <h2 id="editModalTitle" class="text-2xl font-bold text-gray-900">Edit Produk</h2>
            <button onclick="closeModal('editModal')" class="w-8 h-8 flex items-center justify-center rounded-full text-gray-500 hover:bg-gray-100 hover:text-gray-800 transition-colors duration-200" aria-label="Tutup modal">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <form>
            <div class="space-y-6">
                <div>
                    <label for="product_name_edit" class="block text-sm font-medium text-gray-700">Nama Produk</label>
                    <input type="text" id="product_name_edit" value="Laptop Pro X1" class="mt-1 block w-full px-4 py-2.5 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200" aria-required="true">
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="price_edit" class="block text-sm font-medium text-gray-700">Harga</label>
                        <input type="number" id="price_edit" value="15000000" class="mt-1 block w-full px-4 py-2.5 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200" aria-required="true">
                    </div>
                    <div>
                        <label for="stock_edit" class="block text-sm font-medium text-gray-700">Stok</label>
                        <input type="number" id="stock_edit" value="25" class="mt-1 block w-full px-4 py-2.5 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200" aria-required="true">
                    </div>
                </div>
                <div>
                    <label for="description_edit" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                    <textarea id="description_edit" rows="4" class="mt-1 block w-full px-4 py-2.5 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200">Deskripsi singkat tentang Laptop Pro X1.</textarea>
                </div>
            </div>
            <div class="flex justify-end items-center mt-8 pt-4 border-t border-gray-200">
                <button type="button" onclick="closeModal('editModal')" class="bg-gray-100 hover:bg-gray-200 text-gray-800 font-medium py-2.5 px-5 rounded-lg mr-3 transition-colors duration-200">Batal</button>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2.5 px-5 rounded-lg transition-colors duration-200">Update</button>
            </div>
        </form>
    </div>
</div>