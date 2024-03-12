<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SanPhamController;

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

Route::get('/', function () {
    return view('welcome');
});

// Điều hướng vào SanPhamController
Route::get('/san-pham', [SanPhamController::class,'index']);
// Route::get('/san-pham/{id}', [SanPhamController::class, 'detail']);
// Validate route
Route::get('/san-pham/{id}', [SanPhamController::class, 'detail'])->where('id', '[0-9]+');
Route::get('/san-pham/xoa/{id}', [SanPhamController::class, 'delete']);