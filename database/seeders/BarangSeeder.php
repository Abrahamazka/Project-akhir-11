<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Barang;

class BarangSeeder extends Seeder
{
    public function run(): void
    {
        $dataBarang = [
            ['nama_barang' => 'Laptop', 'stok' => 5],
            ['nama_barang' => 'Proyektor', 'stok' => 3],
            ['nama_barang' => 'Kamera', 'stok' => 4],
            ['nama_barang' => 'Arduino Kit', 'stok' => 6],
            ['nama_barang' => 'RFID Reader', 'stok' => 2],
            ['nama_barang' => 'Sensor IoT', 'stok' => 8],
        ];

        foreach ($dataBarang as $barang) {
            Barang::updateOrCreate(
                ['nama_barang' => $barang['nama_barang']],
                ['stok' => $barang['stok']]
            );
        }
    }
}
