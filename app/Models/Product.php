<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'produks';

    protected $fillable = [
        'toko_id',
        'nama',
        'harga',
        'quantity',
        'jenis',
        'description',
    ];

    protected $casts = [
        'harga' => 'decimal:2',
    ];

    public function toko()
    {
        return $this->belongsTo(Toko::class);
    }
}
