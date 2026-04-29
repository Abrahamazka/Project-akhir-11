<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = [
        'kode_transaksi',
        'barang_id',
        'nama_peminjam',
        'kelas',
        'jurusan',
        'nisn',
        'rfid',
        'kebutuhan',
        'tanggal_peminjaman',
        'tanggal_pengembalian',
        'tanggal_pengembalian_aktual',
        'status',
        'foto_wajah',
    ];

    protected $casts = [
        'tanggal_peminjaman' => 'date',
        'tanggal_pengembalian' => 'date',
        'tanggal_pengembalian_aktual' => 'datetime',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
