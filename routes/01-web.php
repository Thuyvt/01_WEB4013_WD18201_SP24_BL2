<?php

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

Route::get('/', function () {
    return view('welcome');
//    return env('MY_NAME');
//    return 'HELLO WOULD';
});
Route::get('/food', function() {
   return ['shushi', 'tempura'];
});
Route::get('/aboutMe', function () {
   return response()->json([
       'name' => 'Vũ Thị Thúy',
       'email' => 'thuyvt66@fpt.edu.vn'
   ]);
});
Route::get('/something', function () {
   return redirect('/food');
});

//Route::view('/hello', '01-xinchao');
//C1:
Route::get('/hello', function() {
    $title = 'Xin chào lớp WD18201';
    $name = ' Tên tôi là Vũ Thị Thúy';
    return view('01-xinchao', ['t' => $title, 'n' => $name]);
});