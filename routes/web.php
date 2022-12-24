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
    return view('index');
});


// Code for extra functions
Route::get('/employee', function () {
    return view('functions/employee');
});
Route::get('/nation', function () {
    return view('functions/nation');
});
Route::get('/expat', function () {
    return view('functions/expat');
});
Route::get('/dependent', function () {
    return view('functions/dependent');
});

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
