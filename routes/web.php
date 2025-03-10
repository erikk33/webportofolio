<?php

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

Route::get('/', function () {
    return redirect('/halamanUtama');
});

Route::get('/halamanUtama', function () {
    return view('HalamanUtama.home');
});



Route::get('/page/projek', function () {
    return view('HalamanProjek.projek');
});
