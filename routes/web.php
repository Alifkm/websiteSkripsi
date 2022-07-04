<?php

use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChangePasswordController;
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

Route::get('/', [DashboardController::class, 'index'])->middleware('auth');


Route::controller(DashboardController::class)->group(function() {
  Route::post('/dashboard', 'search')->middleware('auth'); // search dashboard
  Route::get('/dashboard', 'index')->middleware('auth'); // dashboard
  Route::get('/chart', 'chart')->middleware('auth'); // chart
});


Route::controller(AdminController::class)->group(function() {
  Route::get('/admin', 'index')->middleware('auth'); // all admin
  Route::get('/admin/create', 'create')->middleware(['thisIsSuperAdmin', 'auth']); // create admin form
  Route::post('/admin', 'store')->middleware(['thisIsSuperAdmin', 'auth']); // store admin data
  Route::get('/admin/{admin}/edit', 'edit')->middleware(['thisIsSuperAdmin', 'auth']); // show admin edit form
  Route::put('/admin/{admin}', 'update')->middleware(['thisIsSuperAdmin', 'auth']); // update admin data
  Route::delete('/admin/{admin}', 'destroy')->middleware(['thisIsSuperAdmin', 'auth']); // delete admin data
});


Route::controller(EmployeeController::class)->group(function() {
  Route::get('/employee', 'index')->middleware('auth'); // all employee
  Route::get('/employee/create', 'create')->middleware('auth'); // create employee form
  Route::post('/employee', 'store')->middleware('auth'); // store employee data
  Route::get('/employee/{employee}/edit', 'edit')->middleware('auth'); // show employee edit form
  Route::put('/employee/{employee}', 'update')->middleware('auth'); // update employee data
  Route::delete('/employee/{employee}', 'destroy')->middleware('auth'); // delete employee data
});


Route::controller(ProjectController::class)->group(function() {
  Route::get('/project', 'index')->middleware('auth'); // all project
  Route::get('/project/create', 'create')->middleware('auth'); // create project form
  Route::post('/project', 'store')->middleware('auth'); // store project data
  Route::get('/project/{project}/edit', 'edit')->middleware('auth'); // show project edit form
  Route::put('/project/{project}', 'update')->middleware('auth'); // update project data
  Route::delete('/project/{project}', 'destroy')->middleware('auth'); // delete project data
});


Route::controller(IncomeController::class)->group(function() {
  Route::get('/income', 'index')->middleware('auth'); // all income
  Route::get('/income/create', 'create')->middleware('auth'); // create income form 
  Route::post('/income', 'store')->middleware('auth'); // store income data
  Route::get('/income/{income}/edit', 'edit')->middleware('auth'); // show income edit form
  Route::put('/income/{income}', 'update')->middleware('auth'); // update income data
  Route::delete('/income/{income}', 'destroy')->middleware('auth'); // delete income data
});

Route::controller(OutcomeController::class)->group(function() {
  Route::get('/outcome', 'index')->middleware('auth'); // all outcome
  Route::get('/outcome/create', 'create')->middleware('auth'); // create outcome form
  Route::post('/outcome', 'store')->middleware('auth'); // store outcome data
  Route::get('/outcome/{outcome}/edit', 'edit')->middleware('auth'); // show outcome edit form
  Route::put('/outcome/{outcome}', 'update')->middleware('auth'); // update outcome data
  Route::delete('/outcome/{outcome}', 'destroy')->middleware('auth'); // delete outcome data

});

Route::controller(ChangePasswordController::class)->group(function() {
  Route::get('/change-password', 'index')->middleware('auth'); // show password
  Route::post('/change-password', 'changePassword')->middleware('auth'); // create outcome form
});

Auth::routes();