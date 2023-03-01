<?php

use App\Http\Controllers\CreateBlogPostController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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

// Route::view('/', 'index')->name('index')->middleware('guest');

Route::post('login', LoginController::class);

Route::get('dashboard', DashboardController::class)->middleware('auth');

Route::post('createBlogPost', CreateBlogPostController::class)->middleware('auth');

Route::post('createPost', function () {
    return view('createPost');
});

Route::get('/', function () {
    return view('index');
});

/* Route::get('/', function () {
    return view('login');
}); */
