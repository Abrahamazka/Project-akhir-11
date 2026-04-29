<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $fillable = ['nama_barang', 'stock'];

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class);
    }   
}
