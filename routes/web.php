<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', [UserController::class, 'data'])->name('data');
Route::post('/home/tambah', [UserController::class, 'tambah'])->name('tambah');
Route::post('/home/edit/{id}', [UserController::class, 'edit'])->name('edit');
Route::get('/home/hapus/{id}', [UserController::class, 'hapus'])->name('hapus');
