<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;

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

// all admin
Route::get('/admin', [AdminController::class, 'index']);

// create admin form
Route::get('/admin/create', [AdminController::class, 'create']);

// store admin data
Route::post('/admin', [AdminController::class, 'store']);

// show admin edit form
Route::get('/admin/{admin}/edit', [AdminController::class, 'edit']);

// update admin data
Route::put('/admin/{admin}', [AdminController::class, 'update']);

// delete admin data
Route::delete('/admin/{admin}', [AdminController::class, 'destroy']);

// all employee
Route::get('/employee', [EmployeeController::class, 'index']);

// create employee form
Route::get('/employee/create', [EmployeeController::class, 'create']);

// store employee data
Route::post('/employee', [EmployeeController::class, 'store']);

// show employee edit form
Route::get('/employee/{employee}/edit', [EmployeeController::class, 'edit']);

// update employee data
Route::put('/employee/{employee}', [EmployeeController::class, 'update']);

// delete admin data
Route::delete('/employee/{employee}', [EmployeeController::class, 'destroy']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
