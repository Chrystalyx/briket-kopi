<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Toko;
use Illuminate\Support\Facades\Hash;

class UserAndTokoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sellerUser = User::create([
            'name' => 'Budi Seller',
            'email' => 'seller@example.com',
            'password' => Hash::make('password'),
            'role' => 'penjual',
            'no_telp' => '081234567890',
            'alamat' => 'Jl. Jualan No. 1, Bandung',
        ]);

        Toko::create([
            'user_id' => $sellerUser->id,
            'nama_toko' => 'Toko Maju Jaya',
            'alamat_toko' => 'Jl. Niaga No. 123, Bandung',
            'deskripsi_toko' => 'Menjual berbagai macam barang elektronik berkualitas.',
        ]);
    }
}
