<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table      = 'produk';
    protected $primaryKey = 'produk_id';
    protected $fillable   = [
        'nama_produk',
        'harga',
        'tanggal_produksi',
        'status',
        'stok',
    ];
}
