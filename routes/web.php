<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DasboardController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\MobileController;
use App\Http\Controllers\PenggunaController;
use Illuminate\Support\Facades\Route;

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





// Route::get('/', function () {
//     return view('login');
// });

// Route::get('/register', function () {
//     return view('register');
// });

Route::post('/postlogin', [LoginController::class, 'postlogin'])->name('postlogin');
Route::get('/', [LoginController::class, 'login'])->name('login')->middleware('guest');

Route::post('/register_post', [RegisterController::class, 'register_post'])->name('register_post');

Route::get('logout', [LogoutController::class, 'logout'])->name('logout');


Route::group(['middleware' => ['auth']], function () {
    Route::get('/register', [RegisterController::class, 'register'])->name('register');

    Route::get('/home', [DasboardController::class, 'index'])->name('home');
    //done
    Route::get('/inventaris', [InventarisController::class, 'index'])->name('inventaris');
    //done
    Route::post('/inventaris', [InventarisController::class, 'store'])->name('inventaris.store');
    //done
    Route::get('/inventaris/{inventaris}/edit', [InventarisController::class, 'edit'])->name('inventaris.edit');
    //done
    Route::post('/inventaris/{inventaris}/edit', [InventarisController::class, 'update'])->name('inventaris.update');
    //done
    Route::delete('/inventaris/{inventaris}/hapus', [InventarisController::class, 'destroy'])->name('inventaris.delete');

    //done
    Route::get('/pengguna', [PenggunaController::class, 'index'])->name('pengguna');
    //done
    Route::post('/pengguna', [PenggunaController::class, 'store'])->name('pengguna.store');
    Route::get('/pengguna/{pengguna}/edit', [PenggunaController::class, 'edit'])->name('pengguna.edit');
    Route::get('/pengguna/{pengguna}/detail', [PenggunaController::class, 'detail'])->name('pengguna.detail');
    Route::post('/pengguna/{pengguna}/edit', [PenggunaController::class, 'update'])->name('pengguna.update');
    Route::delete('/pengguna/{pengguna}/hapus', [PenggunaController::class, 'destroy'])->name('pengguna.delete');


    //done
    Route::get('/jenis', [JenisController::class, 'index'])->name('jenis');
    //done
    Route::post('/jenis', [JenisController::class, 'store'])->name('jenis.store');
    Route::get('/jenis/{jenis}/edit', [JenisController::class, 'edit'])->name('jenis.edit');
    Route::post('/jenis/{jenis}/edit', [JenisController::class, 'update'])->name('jenis.update');
    Route::delete('/jenis/{jenis}/hapus', [JenisController::class, 'destroy'])->name('jenis.delete');


    //done
    Route::get('/mobile', [MobileController::class, 'index'])->name('mobile');
    //done
    Route::post('/mobile', [MobileController::class, 'store'])->name('mobile.store');
    Route::post('/mobile/{mobile}/toggle', [MobileController::class, 'toggle'])->name('mobile.toggle');
    Route::get('/hapus/{id}', [MobileController::class, 'delete_single_data']);
    Route::get('/edit/{id}', [MobileController::class, 'edit_single_data']);
});