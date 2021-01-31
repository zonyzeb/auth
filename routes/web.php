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

Route::redirect('/', '/login');

// Route::get('/dashboard', \App\Http\Controllers\Dashboard\DashboardController::class)
// 	->middleware(['auth'])
// 	->name('dashboard');

Route::Group(['middleware'=>'auth'], function(){
	Route::get('/dashboard', \App\Http\Controllers\Dashboard\DashboardController::class)->name('dashboard');
	Route::get('/profile', function(){
		return view('auth.profile');
	})->name('profile');
});

require __DIR__.'/auth.php';
