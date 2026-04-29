<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;

Route::view('/', 'welcome')->name('welcome');
Route::view('/home', 'index')->name('home');

Route::get('/form', [PeminjamanController::class, 'create'])->name('pinjam');
Route::post('/form', [PeminjamanController::class, 'storeStep1'])->name('pinjam.store');

Route::get('/identitas', [PeminjamanController::class, 'identitas'])->name('identitas');
Route::post('/identitas', [PeminjamanController::class, 'storeIdentitas'])->name('identitas.store');

Route::get('/sukses/{transaksi}', [PeminjamanController::class, 'sukses'])->name('sukses');

Route::get('/pengembalian', [PengembalianController::class, 'index'])->name('pengembalian');
Route::post('/pengembalian/{transaksi}/proses', [PengembalianController::class, 'proses'])->name('pengembalian.proses');
