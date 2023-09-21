<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\FrontController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('list-beasiswa');
});

Route::get('/list-beasiswa', [FrontController::class, 'index'])->name('list-beasiswa');
Route::get('/daftar-beasiswa', [FrontController::class, 'daftar_beasiswa'])->name('daftar-beasiswa');
Route::post('/daftar-beasiswa', [FrontController::class, 'simpan_data_pendaftaran'])->name('simpan_data_pendaftaran');
Route::get('/hasil', [FrontController::class, 'hasil'])->name('hasil');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
