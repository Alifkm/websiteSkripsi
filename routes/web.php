<?php

use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\OutcomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', [DashboardController::class, 'index']);

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

// delete employee data
Route::delete('/employee/{employee}', [EmployeeController::class, 'destroy']);

// all project
Route::get('/project', [ProjectController::class, 'index']);

// create project form
Route::get('/project/create', [ProjectController::class, 'create']);

// store project data
Route::post('/project', [ProjectController::class, 'store']);

// show project edit form
Route::get('/project/{project}/edit', [ProjectController::class, 'edit']);

// update project data
Route::put('/project/{project}', [ProjectController::class, 'update']);

// delete project data
Route::delete('/project/{project}', [ProjectController::class, 'destroy']);

// all income
Route::get('/income', [IncomeController::class, 'index']);

// create income form
Route::get('/income/create', [IncomeController::class, 'create']);

// store income data
Route::post('/income', [IncomeController::class, 'store']);

// show income edit form
Route::get('/income/{income}/edit', [IncomeController::class, 'edit']);

// update income data
Route::put('/income/{income}', [IncomeController::class, 'update']);

// delete income data
Route::delete('/income/{income}', [IncomeController::class, 'destroy']);


// all outcome
Route::get('/outcome', [OutcomeController::class, 'index']);

// create outcome form
Route::get('/outcome/create', [OutcomeController::class, 'create']);

// store outcome data
Route::post('/outcome', [OutcomeController::class, 'store']);

// show outcome edit form
Route::get('/outcome/{outcome}/edit', [OutcomeController::class, 'edit']);

// update outcome data
Route::put('/outcome/{outcome}', [OutcomeController::class, 'update']);

// delete outcome data
Route::delete('/outcome/{outcome}', [OutcomeController::class, 'destroy']);

// dashboard
Route::post('/dashboard', [DashboardController::class, 'search']);

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/chart', [DashboardController::class, 'chart']);

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
