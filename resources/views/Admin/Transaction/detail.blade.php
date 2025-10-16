<div id="detailModal"
    class="fixed inset-0 bg-black bg-opacity-10 backdrop-blur-md hidden flex items-center justify-center z-50 p-4">
    <div class="bg-white rounded-xl shadow-2xl p-6 sm:p-8 w-full max-w-lg">
        <div class="flex justify-between items-center border-b pb-4 mb-6">
            <h2 class="text-2xl font-bold">Detail Transaksi</h2>
            <button onclick="closeModal('detailModal')"
                class="w-8 h-8 flex items-center justify-center rounded-full text-gray-500 hover:bg-gray-100">&times;</button>
        </div>
        <div class="space-y-4">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <p class="text-sm text-gray-500">Nama User</p>
                    <p id="detail_user_name" class="font-semibold"></p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Tanggal</p>
                    <p id="detail_tanggal" class="font-semibold"></p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Status</p>
                    <p id="detail_status" class="font-semibold"></p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Metode</p>
                    <p id="detail_metode" class="font-semibold"></p>
                </div>
            </div>

            <div class="border-t pt-4">
                <h3 class="font-bold text-lg mb-2">Rincian Item</h3>
                <div id="detail_items_container" class="space-y-2 max-h-48 overflow-y-auto">
                </div>
            </div>

            <div class="flex justify-between items-center border-t pt-4 mt-4">
                <p class="text-lg font-bold">Grand Total</p>
                <p id="detail_grand_total" class="text-lg font-bold text-blue-600"></p>
            </div>
        </div>
        <div class="flex justify-end items-center mt-8 pt-4 border-t">
            <button type="button" onclick="closeModal('detailModal')"
                class="bg-gray-100 text-gray-800 font-medium py-2.5 px-5 rounded-lg">Tutup</button>
        </div>
    </div>
</div>
