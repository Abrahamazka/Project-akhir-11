<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up(): void
{
    Schema::create('transaksis', function (Blueprint $table) {
        $table->id();
        $table->string('kode_transaksi')->unique();
        $table->foreignId('barang_id')->constrained('barangs')->onDelete('cascade');
        $table->string('nama_peminjam');
        $table->string('kelas');
        $table->string('jurusan');
        $table->string('nisn');
        $table->string('rfid');
        $table->text('kebutuhan');
        $table->date('tanggal_peminjaman');
        $table->date('tanggal_pengembalian');
        $table->dateTime('tanggal_pengembalian_aktual')->nullable();
        $table->string('status')->default('Dipinjam');
        $table->string('foto_wajah')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
