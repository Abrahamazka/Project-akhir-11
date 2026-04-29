<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PeminjamanController extends Controller
{
    public function create()
    {
        $barangs = Barang::orderBy('nama_barang')->get();

        return view('pinjam', compact('barangs'));
    }

    public function storeStep1(Request $request)
    {
        $validated = $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
            'kebutuhan' => 'required|string|max:300',
        ], [
            'barang_id.required' => 'Barang wajib dipilih.',
            'barang_id.exists' => 'Barang tidak valid.',
            'tanggal_pinjam.required' => 'Tanggal peminjaman wajib diisi.',
            'tanggal_kembali.required' => 'Tanggal pengembalian wajib diisi.',
            'tanggal_kembali.after_or_equal' => 'Tanggal pengembalian tidak boleh sebelum tanggal peminjaman.',
            'kebutuhan.required' => 'Kebutuhan peminjaman wajib diisi.',
            'kebutuhan.max' => 'Kebutuhan maksimal 300 karakter.',
        ]);

        session(['peminjaman.step1' => $validated]);

        return redirect()->route('identitas');
    }

    public function identitas()
    {
        if (!session()->has('peminjaman.step1')) {
            return redirect()->route('pinjam')->with('error', 'Isi form peminjaman dulu.');
        }

        return view('identitas');
    }

    public function storeIdentitas(Request $request)
    {
        if (!session()->has('peminjaman.step1')) {
            return redirect()->route('pinjam')->with('error', 'Isi form peminjaman dulu.');
        }

        $validated = $request->validate([
            'rfid' => 'required|string|max:50',
            'nama' => 'required|string|max:100',
            'kelas' => 'required|string|max:50',
            'jurusan' => 'required|string|max:50',
            'nisn' => 'required|string|max:30',
            'foto_wajah' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ], [
            'rfid.required' => 'RFID wajib diisi.',
            'nama.required' => 'Nama wajib diisi.',
            'kelas.required' => 'Kelas wajib diisi.',
            'jurusan.required' => 'Jurusan wajib diisi.',
            'nisn.required' => 'NISN wajib diisi.',
            'foto_wajah.image' => 'File harus berupa gambar.',
            'foto_wajah.mimes' => 'Foto harus berformat jpg, jpeg, png, atau webp.',
            'foto_wajah.max' => 'Ukuran foto maksimal 2 MB.',
        ]);

        $fotoPath = null;

        if ($request->hasFile('foto_wajah')) {
            $fotoPath = $request->file('foto_wajah')->store('foto-wajah', 'public');
        }

        $step1 = session('peminjaman.step1');

        DB::beginTransaction();

        try {
            $barang = Barang::findOrFail($step1['barang_id']);

            if ($barang->stok <= 0) {
                DB::rollBack();
                return redirect()->route('pinjam')->with('error', 'Stok barang sedang habis.');
            }

            $transaksi = Transaksi::create([
                'kode_transaksi' => 'TRX-' . now()->format('Ymd') . '-' . strtoupper(Str::random(5)),
                'barang_id' => $barang->id,
                'nama_peminjam' => $validated['nama'],
                'kelas' => $validated['kelas'],
                'jurusan' => $validated['jurusan'],
                'nisn' => $validated['nisn'],
                'rfid' => $validated['rfid'],
                'kebutuhan' => $step1['kebutuhan'],
                'tanggal_peminjaman' => $step1['tanggal_pinjam'],
                'tanggal_pengembalian' => $step1['tanggal_kembali'],
                'status' => 'Dipinjam',
                'foto_wajah' => $fotoPath,
            ]);

            $barang->decrement('stok');

            DB::commit();

            session()->forget('peminjaman.step1');

            return redirect()->route('sukses', $transaksi->id);
        } catch (\Throwable $e) {
            DB::rollBack();

            return redirect()->route('pinjam')->with('error', 'Terjadi kesalahan saat menyimpan transaksi.');
        }
    }

    public function sukses(Transaksi $transaksi)
    {
        $transaksi->load('barang');

        return view('sukses', compact('transaksi'));
    }
}
