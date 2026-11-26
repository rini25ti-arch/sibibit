<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $fillable = ['user_id', 'varietas_id', 'jumlah_beli', 'total_harga', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function varietas()
    {
        return $this->belongsTo(Varietas::class, 'varietas_id');
    }
}
