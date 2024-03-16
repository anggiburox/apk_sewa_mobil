<?php

use Illuminate\Support\Facades\Route;



use App\Http\Controllers\Auth;

//admin
use App\Http\Controllers\DashboardAdmin;
use App\Http\Controllers\PenggunaControllersAdmin;
use App\Http\Controllers\ManajemenMobilControllersAdmin;
use App\Http\Controllers\PeminjamanMobilControllersAdmin;
use App\Http\Controllers\PengembalianMobilControllersAdmin;

//pengguna
use App\Http\Controllers\DashboardPengguna;
use App\Http\Controllers\ManajemenMobilControllersPengguna;
use App\Http\Controllers\PeminjamanMobilControllersPengguna;
use App\Http\Controllers\PengembalianMobilControllersPengguna;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::post('/login', [Auth::class, 'login']);
Route::get('/logout', [Auth::class, 'logout']);

Route::get('/', [Auth::class, 'index'])->name('login');
Route::get('register', [Auth::class, 'register']);
Route::post('/auth/register/insertregister/',[Auth::class, 'insertregister']);

Route::post('/auth/updatelupapassword',[Auth::class, 'updatelupapassword']);

Route::middleware(['auth','admin'])->group(function () {

Route::get('/admin/dashboard', [DashboardAdmin::class, 'index']);
    //route admin pengguna
    Route::get('/admin/pengguna/', [PenggunaControllersAdmin::class, 'index']);
    Route::get('/admin/pengguna/tambah', [PenggunaControllersAdmin::class, 'tambah']);
    Route::post('/admin/pengguna/store', [PenggunaControllersAdmin::class, 'store']);
    Route::get('/admin/pengguna/edit/{id}',[PenggunaControllersAdmin::class, 'edit']);
    Route::post('/admin/pengguna/update',[PenggunaControllersAdmin::class, 'update']);
    Route::get('/admin/pengguna/hapus/{id}',[PenggunaControllersAdmin::class, 'hapus']);

    //route admin manajemen mobil
    Route::get('/admin/manajemen_mobil/', [ManajemenMobilControllersAdmin::class, 'index']);
    Route::get('/admin/manajemen_mobil/tambah', [ManajemenMobilControllersAdmin::class, 'tambah']);
    Route::post('/admin/manajemen_mobil/store', [ManajemenMobilControllersAdmin::class, 'store']);
    Route::get('/admin/manajemen_mobil/edit/{id}',[ManajemenMobilControllersAdmin::class, 'edit']);
    Route::post('/admin/manajemen_mobil/update',[ManajemenMobilControllersAdmin::class, 'update']);
    Route::get('/admin/manajemen_mobil/hapus/{id}',[ManajemenMobilControllersAdmin::class, 'hapus']);

    
    //route admin peminjaman mobil
    Route::get('/admin/peminjaman_mobil/', [PeminjamanMobilControllersAdmin::class, 'index']);
    Route::get('/admin/peminjaman_mobil/tambah', [PeminjamanMobilControllersAdmin::class, 'tambah']);
    Route::post('/admin/peminjaman_mobil/store', [PeminjamanMobilControllersAdmin::class, 'store']);
    Route::get('/admin/peminjaman_mobil/edit/{id}',[PeminjamanMobilControllersAdmin::class, 'edit']);
    Route::post('/admin/peminjaman_mobil/update',[PeminjamanMobilControllersAdmin::class, 'update']);
    Route::get('/admin/peminjaman_mobil/hapus/{id}',[PeminjamanMobilControllersAdmin::class, 'hapus']);
    
    //route admin pengembalian mobil
    Route::get('/admin/pengembalian_mobil/', [PengembalianMobilControllersAdmin::class, 'index']);
    Route::get('/admin/pengembalian_mobil/tambah', [PengembalianMobilControllersAdmin::class, 'tambah']);
    Route::post('/admin/pengembalian_mobil/store', [PengembalianMobilControllersAdmin::class, 'store']);
    Route::get('/admin/pengembalian_mobil/edit/{id}',[PengembalianMobilControllersAdmin::class, 'edit']);
    Route::post('/admin/pengembalian_mobil/update',[PengembalianMobilControllersAdmin::class, 'update']);
    Route::get('/admin/pengembalian_mobil/hapus/{id}',[PengembalianMobilControllersAdmin::class, 'hapus']);

});


Route::middleware(['auth','pengguna'])->group(function () {
Route::get('/pengguna/dashboard', [DashboardPengguna::class, 'index']); 

//route pengguna manajemen mobil
Route::get('/pengguna/manajemen_mobil/', [ManajemenMobilControllersPengguna::class, 'index']);
    

    //route pengguna peminjaman mobil
    Route::get('/pengguna/peminjaman_mobil/', [PeminjamanMobilControllersPengguna::class, 'index']);
    
    Route::get('/pengguna/pengembalian_mobil/', [PengembalianMobilControllersPengguna::class, 'index']);

});