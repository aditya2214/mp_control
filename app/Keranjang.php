<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Keranjang extends Model
{
    public function keranjang()
    {
        return $this->belongsTo('App\Produk', 'id_produk', 'id');
    }
}
