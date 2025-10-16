<div id="editModal"
    class="fixed inset-0 bg-black bg-opacity-10 backdrop-blur-md hidden flex items-center justify-center z-50 p-4">
    <div class="bg-white rounded-xl shadow-2xl p-6 sm:p-8 w-full max-w-md">
        <div class="flex justify-between items-center border-b pb-4 mb-6">
            <h2 class="text-2xl font-bold">Edit Produk</h2>
            <button onclick="closeModal('editModal')"
                class="w-8 h-8 flex items-center justify-center rounded-full text-gray-500 hover:bg-gray-100">&times;</button>
        </div>
        <form id="editForm" method="POST">
            @csrf
            @method('PUT')
            <div class="space-y-6">
                <div>
                    <label for="product_name_edit" class="block text-sm font-medium">Nama Produk</label>
                    <input type="text" name="nama" id="product_name_edit"
                        class="mt-1 block w-full px-4 py-2.5 border rounded-lg" required>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="price_edit" class="block text-sm font-medium">Harga</label>
                        <input type="number" name="harga" id="price_edit"
                            class="mt-1 block w-full px-4 py-2.5 border rounded-lg" required>
                    </div>
                    <div>
                        <label for="stock_edit" class="block text-sm font-medium">Stok</label>
                        <input type="number" name="quantity" id="stock_edit"
                            class="mt-1 block w-full px-4 py-2.5 border rounded-lg" required>
                    </div>
                </div>
                <div>
                    <label for="jenis_edit" class="block text-sm font-medium text-gray-700">Jenis Produk</label>
                    <input type="text" name="jenis" id="jenis_edit"
                        class="mt-1 block w-full px-4 py-2.5 border rounded-lg" required>
                </div>
                <div>
                    <label for="description_edit" class="block text-sm font-medium">Deskripsi</label>
                    <textarea name="description" id="description_edit" rows="4"
                        class="mt-1 block w-full px-4 py-2.5 border rounded-lg"></textarea>
                </div>
            </div>
            <div class="flex justify-end items-center mt-8 pt-4 border-t">
                <button type="button" onclick="closeModal('editModal')"
                    class="bg-gray-100 text-gray-800 font-medium py-2.5 px-5 rounded-lg mr-3">Batal</button>
                <button type="submit" class="bg-blue-600 text-white font-medium py-2.5 px-5 rounded-lg">Update</button>
            </div>
        </form>
    </div>
</div>
