<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('index');
})->name('home');
Route::get('/form', function () {
    return view('pinjam');
})->name('pinjam');
Route::get('/pengembalian', function () {
    return view('balik');
})->name('balik');
Route::get('/identitas', function () {
    return view('identitas') ;
})->name('identitas');
Route::get('/sukses', function () {
    return view('sukses');
})->name('sukses')  ;
