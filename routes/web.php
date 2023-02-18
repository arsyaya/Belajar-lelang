<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LelangController;
use App\Http\Controllers\UserController;

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
Route::get('/', [UserController::class, 'welcome'])->name('welcome');

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/master', function () {
    return view('template.master');
});


Route::resource('barang', BarangController::class)->middleware('auth', 'level:admin, petugas');


// Route::get('/login', function () {
//     return view('auth.login');
// });
//REGISTER
Route::get('register', [RegisterController::class, 'register'])->name('register')->middleware('guest');
Route::post('register', [RegisterController::class, 'proses'])->name('register.proses')->middleware('guest');

//LOGIN - LOGOUT
Route::get('login', [LoginController::class, 'view'])->name('login')->middleware('guest');
Route::post('login', [LoginController::class, 'proses'])->name('login.proses')->middleware('guest');
Route::get('logout', [LoginController::class, 'logout'])->name('logout-petugas');

//DASHBOARD
Route::get('/dashboard/admin', [Dashboard::class, 'admin'])->name('dashboard.admin')->middleware(['auth', 'level:admin, petugas']);
Route::get('/dashboard/petugas', [Dashboard::class, 'petugas'])->name('dashboard.petugas')->middleware(['auth', 'level:petugas']);
Route::get('/dashboard/masyarakat', [Dashboard::class, 'masyarakat'])->name('dashboard.masyarakat')->middleware(['auth', 'level:masyarakat']);

//PELELANGAN
Route::resource('lelang', LelangController::class)->middleware('auth', 'level:admin, petugas');

//ERROR
Route::view('error/403', 'error.403')->name('error.403');

//USER
Route::resource('user', UserController::class)->middleware('auth', 'level:admin');
// Route::get('/admin/users', [UserController::class, 'index'])->name('index')->middleware('auth','level:admin');
