<?php

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

    Route::get('/profile', 'ProfileController@index')->name('profile');
    Route::put('/profile', 'ProfileController@update')->name('profile.update');

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