<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\AuthController;

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

//authentication
Route::get('/login',[AuthController::class,'create'])->name('login');
Route::post('/login',[AuthController::class,'store'])->name('login.store');
Route::post('logout',[AuthController::class,'logout'])->name('logout');
Route::get('register',fn()=>Inertia::reander('Auth/Register'))->name('register')->breadcrumbs('User Registration');

 Route::middleware(['auth'])->group(function () {


    // Route::get('/dashboard',[DashboardController::class,'index'])
    //      ->name('dashboard')
    //      ->breadcrumbs('dashboard');

Route::get('/dashboard', fn()=>(Inertia::render('Landing',[])))
     ->name('dashboard')
     ->breadcrumbs('dashboard');
    // Route::get('/',[DashboardController::class,'index']);
 });
Route::get('/', fn()=>(Inertia::render('Landing',[])))->name('landing');

