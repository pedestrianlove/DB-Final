<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DependentController;
use App\Http\Controllers\NationController;
use App\Http\Controllers\ExpatController;
use App\Http\Controllers\IndexController;
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

Route::get('/', [IndexController::class, 'index']);


// Code for extra functions

// Employee
Route::get('/employee', [EmployeeController::class, 'index']);
Route::get('/employee/create', [EmployeeController::class, 'show_create']);
Route::post('/employee/create', [EmployeeController::class, 'create']);
Route::get('/employee/{employee:ID}', [EmployeeController::class, 'show']);
Route::post('/employee/{employee:ID}', [EmployeeController::class, 'update']);
Route::get('/employee/{employee:ID}/delete', [EmployeeController::class, 'delete']);

// Nation
Route::get('/nation', [NationController::class, 'index']);
Route::get('/nation/create', [NationController::class, 'show_create']);
Route::post('/nation/create', [NationController::class, 'create']);
Route::get('/nation/{nation:Code}', [NationController::class, 'show']);
Route::post('/nation/{nation:Code}', [NationController::class, 'update']);
Route::get('/nation/{nation:Code}/delete', [NationController::class, 'delete']);

// Expat
Route::get('/expat', [ExpatController::class, 'index']);
Route::get('/expat/create', [ExpatController::class, 'show_create']);
Route::post('/expat/create', [ExpatController::class, 'create']);
Route::get('/expat/{expat:expat_id}', [ExpatController::class, 'show']);
Route::post('/expat/{expat:expat_id}', [ExpatController::class, 'update']);
Route::get('/expat/{expat:expat_id}/delete', [ExpatController::class, 'delete']);

// Dependent
Route::get('/dependent', [DependentController::class, 'index']);
Route::get('/dependent/create', [DependentController::class, 'show_create']);
Route::post('/dependent/create', [DependentController::class, 'create']);
Route::get('/dependent/{dependent:dependent_id}', [DependentController::class, 'show']);
Route::post('/dependent/{dependent:dependent_id}', [DependentController::class, 'update']);
Route::get('/dependent/{dependent:dependent_id}/delete', [DependentController::class, 'delete']);

