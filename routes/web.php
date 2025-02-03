<?php

use App\Http\Controllers\BerkasUserController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KapalController;
use App\Http\Controllers\KepulanganController;
use App\Http\Controllers\PermohonanBerlayarController;
use App\Http\Controllers\RekomendasiBerlayarController;
use App\Http\Controllers\RekomendasiLogistikController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Auth::routes();
Route::middleware(['auth:web', 'verified'])->group(function () {
    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index')->name('home');
    //kapal
    Route::get('/kapal', [KapalController::class, 'index'])->name('kapal');
    Route::post('/kapal/store', [KapalController::class, 'store'])->name('kapal.store');
    Route::delete('/kapal/delete/{id}', [KapalController::class, 'destroy'])->name('kapal.delete');
    Route::get('/kapal-datatable', [KapalController::class, 'getKapalDataTable']);
    //spb
    Route::get('/spb', [PermohonanBerlayarController::class, 'index'])->name('spb');
    Route::post('/spb/store', [PermohonanBerlayarController::class, 'store'])->name('spb.store');
    Route::delete('/spb/delete/{id}', [PermohonanBerlayarController::class, 'destroy'])->name('spb.delete');
    Route::get('/spb-datatable', [PermohonanBerlayarController::class, 'getPermohonanBerlayarDataTable']);
    //kepulangan
    Route::get('/kepulangan', [KepulanganController::class, 'index'])->name('kepulangan');
    Route::post('/spb/store', [PermohonanBerlayarController::class, 'store'])->name('spb.store');
    Route::delete('/spb/delete/{id}', [PermohonanBerlayarController::class, 'destroy'])->name('spb.delete');
    Route::get('/spb-datatable', [PermohonanBerlayarController::class, 'getPermohonanBerlayarDataTable']);
    //jadwal
    Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwal');
    Route::post('/spb/store', [PermohonanBerlayarController::class, 'store'])->name('spb.store');
    Route::delete('/spb/delete/{id}', [PermohonanBerlayarController::class, 'destroy'])->name('spb.delete');
    Route::get('/spb-datatable', [PermohonanBerlayarController::class, 'getPermohonanBerlayarDataTable']);
    Route::get('/detail-spb/{id}', [PermohonanBerlayarController::class, 'show']);
    //rekomendasi
    Route::post('/rekomendasi/store', [RekomendasiBerlayarController::class, 'store'])->name('rekomendasi.store');
    Route::get('/rekomendasi-datatable/{id_permohonan_berlayar}', [RekomendasiBerlayarController::class, 'getRekomendasiDataTable']);
    Route::post('/rekomendasi/update-permohonan/{id}', [RekomendasiBerlayarController::class, 'update'])->name('rekomendasi.update-permohonan');
    Route::post('/rekomendasi/verifikasi/{id}', [RekomendasiBerlayarController::class, 'verifikasi'])->name('rekomendasi.verifikasi');
    Route::delete('/rekomendasi/delete/{id}', [RekomendasiBerlayarController::class, 'destroy'])->name('rekomendasi.delete');
    //logistik
    Route::get('/logistik', [RekomendasiBerlayarController::class, 'index'])->name('logistik');
    //berkas
    Route::post('/berkas_user/store', [BerkasUserController::class, 'store'])->name('berkas_user.store');
    Route::post('/berkas_user/update-berkas', [BerkasUserController::class, 'updateBerkas'])->name('berkas_user.update-berkas');
    Route::get('/berkas_user/update', [BerkasUserController::class, 'update'])->name('berkas_user.update');
    Route::get('/berkas-user/{id}', [BerkasUserController::class, 'show']);
    //profile
    Route::get('/profile', 'ProfileController@index')->name('profile');
    Route::put('/profile', 'ProfileController@update')->name('profile.update');

    //report
    Route::get('/report/logistik/{id}', 'ReportController@logistik')->name('report.logistik');
    Route::get('/report/spb/{id}', 'ReportController@spb')->name('report.spb');


    Route::get('/about', function () {
        return view('about');
    })->name('about');
});
Route::middleware(['auth:web', 'role:Pimpinan', 'verified'])->group(function () {
    //user managemen
    // Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::get('/users/admin', [UserController::class, 'admin'])->name('users.admin');
    Route::get('/users/user', [UserController::class, 'user'])->name('users.user');
    Route::get('/users/staff', [UserController::class, 'staff'])->name('users.staff');
    Route::post('/users/store',  [UserController::class, 'store'])->name('users.store');
    Route::get('/users/edit/{id}',  [UserController::class, 'edit'])->name('users.edit');
    Route::delete('/users/delete/{id}',  [UserController::class, 'destroy'])->name('users.delete');
    Route::get('/users-datatable/{role}', [UserController::class, 'getUsersDataTable']);
});