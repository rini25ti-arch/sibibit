<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Varietas extends Model
{
    protected $table = 'varietas';
    protected $fillable = [
        'nama_varietas',
        'kategori_lahan',
        'harga',
        'stok',
        'deskripsi',
        'keunggulan',
        'cara_penanaman',
        'gambar',
    ];
}
