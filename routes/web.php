<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\smsController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\GroupsController;

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

Route::get('/',[smsController::class, 'index'])->name('login');
Route::get('/signup',[smsController::class, 'registration'])->name('signup');


Route::post('/create-user',[UserAuthController::class, 'createUser'])->name('user-create');
Route::post('/login-user',[UserAuthController::class, 'login'])->name('user-login');
Route::get('/logout',[UserAuthController::class,'logout'])->name('logout');

Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');


Route::get('/dashboard/add-customer',[CustomerController::class, 'index'])->name('add-customer');
Route::get('/dashboard/manage-customer',[CustomerController::class, 'manage'])->name('manage-customer');

Route::post('/dashboard/create-customer',[CustomerController::class, 'createCustomer'])->name('create-customer');

Route::get('/dashboard/groups',[GroupsController::class, 'index'])->name('groups');
Route::post('/dashboard/add-new-group',[GroupsController::class, 'addGroup'])->name('add-new-group');
Route::get('/dashboard/delete/name/{id}',[GroupsController::class, 'delete'])->name('delete-name');



Route::get('/dashboard/name/edit/{id}',[GroupsController::class, 'edit'])->name('edit-name');
Route::post('/dashboard/name/update/{id}',[GroupsController::class, 'update'])->name('update-name');







