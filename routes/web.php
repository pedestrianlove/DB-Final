<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DependentController;
use App\Http\Controllers\NationController;
use App\Http\Controllers\ExpatController;
use Illuminate\Support\Facades\Route;
use App\Models\Employee;
use App\Models\Nation;
use App\Models\Dependent;
use App\Models\Expat;

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

// Employee
Route::get('/employee', [EmployeeController::class, 'index']);
Route::get('/employee/{employee:ID}', [EmployeeController::class, 'show']);
Route::post('/employee/{employee:ID}', [EmployeeController::class, 'update']);

// Nation
Route::get('/nation', [NationController::class, 'index']);
Route::get('/nation/{nation:Code}', [NationController::class, 'show']);
Route::post('/nation/{nation:Code}', [NationController::class, 'update']);

// Dependent
Route::get('/expat', [ExpatController::class, 'index']);
Route::get('/expat/{expat:Employee_ID}', [ExpatController::class, 'show']);
Route::post('/expat/{expat:Employee_ID}', [ExpatController::class, 'update']);

// Expat
Route::get('/dependent', [DependentController::class, 'index']);
Route::get('/dependent/{dependent:ID}', [DependentController::class, 'show']);
Route::post('/dependent/{dependent:ID}', [DependentController::class, 'update']);

