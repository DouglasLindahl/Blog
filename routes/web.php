<?php

use App\Http\Controllers\CreateBlogPostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GoToMyPageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterAccountController;
use Illuminate\Support\Facades\Auth;

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

Route::view('/', 'index')->name('login')->middleware('guest');

Route::post('login', LoginController::class);

Route::get('dashboard', DashboardController::class)->middleware('auth');

Route::get('logout', LogoutController::class);



Route::post('createBlogPost', CreateBlogPostController::class)->middleware('auth');
Route::post('createPost', function () {
    return view('createPost');
});

Route::post('registerAccount', RegisterAccountController::class);
Route::post('register', function () {
    return view('register');
});

Route::post('myPage', GoToMyPageController::class)->middleware('auth');
Route::post('goToMyPage', function () {
    return view('myPage');
});

/* Route::get('/', function () {
    return view('login');
}); */
