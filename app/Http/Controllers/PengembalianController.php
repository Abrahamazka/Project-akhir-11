<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengembalianController extends Controller
{
    public function index(Request $request)
    {
        $transaksi = null;

        if ($request->filled('kode_transaksi')) {
            $transaksi = Transaksi::with('barang')
                ->where('kode_transaksi', $request->kode_transaksi)
                ->first();

            if (!$transaksi) {
                return view('balik', [
                    'transaksi' => null,
                ])->with('error', 'Data transaksi tidak ditemukan.');
            }
        }

        return view('pengembalian', compact('transaksi'));
    }

    public function proses(Transaksi $transaksi)
    {
        if ($transaksi->status === 'Dikembalikan') {
            return redirect()->route('pengembalian', [
                'kode_transaksi' => $transaksi->kode_transaksi
            ])->with('error', 'Barang ini sudah dikembalikan sebelumnya.');
        }

        DB::beginTransaction();

        try {
            $transaksi->update([
                'status' => 'Dikembalikan',
                'tanggal_pengembalian_aktual' => now(),
            ]);

            if ($transaksi->barang) {
                $transaksi->barang->increment('stok');
            }

            DB::commit();

            return redirect()->route('pengembalian', [
                'kode_transaksi' => $transaksi->kode_transaksi
            ])->with('success', 'Pengembalian berhasil diproses.');
        } catch (\Throwable $e) {
            DB::rollBack();

            return redirect()->route('pengembalian', [
                'kode_transaksi' => $transaksi->kode_transaksi
            ])->with('error', 'Terjadi kesalahan saat memproses pengembalian.');
        }
    }
}
