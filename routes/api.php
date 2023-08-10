<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group(function () {

    Route::post('/logout', [\App\Http\Controllers\Api\AuthController::class, 'logout']);

    Route::resource('/posts', \App\Http\Controllers\Api\PostController::class); // tambahkan ini
});
Route::post('/home/tambah', [UserController::class, 'tambah'])->name('tambah');
Route::post('/home/edit/{id}', [UserController::class, 'edit'])->name('edit');
Route::get('/home/hapus/{id}', [UserController::class, 'hapus'])->name('hapus');
