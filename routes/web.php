<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
});

Route::get('/home', [AuthController::class, 'index'])->name('Home');
Route::post('/home/send', [AuthController::class, 'create'])->name('send.form');
Route::get('/gallery', [AuthController::class, 'gallery'])->name('view.gallery');
Route::get('/gallery/filter', [AuthController::class, 'filter'])->name('laporan.filter');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login/send', [AuthController::class, 'sendlogin'])->name('send.login');


Route::middleware(['auth'])->group(function () {
});
Route::get('/admin', [AdminController::class, 'index'])->name('view.admin');
Route::get('/admin/edit/{id}', [AdminController::class, 'edit'])->name('view.edit');
Route::put('/admin/edit/{id}/update', [AdminController::class, 'update'])->name('update');
Route::delete('admin/delete/{id}', [AdminController::class, 'delete'])->name('delete');
