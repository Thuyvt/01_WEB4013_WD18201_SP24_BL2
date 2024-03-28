<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\CustomerController;
use \App\Http\Controllers\LoginController;

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



// Khai báo route đủ phương thức cho 1 đối tượng
//Route::resource('/customers', CustomerController::class)->middleware('auth.basic');
// Tạo route khai báo login
Route::match(['GET', 'POST'], '/login',[LoginController::class, 'login'])->name('login');
Route::get('/logout',[LoginController::class, 'logout'])->name('logout');

Route::middleware([\App\Http\Middleware\CheckRole::class])->group(function () {
    // tất cả các route muốn bảo vệ được đưa vào đy
    Route::get('/day04', function () {
        return view('Day04');
    });
//    Route::get('/customers/create', CustomerController::class, 'create');
    Route::resource('/customers', CustomerController::class);
});
