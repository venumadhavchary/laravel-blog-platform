<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('posts.index');
    }
    return view('welcome');
})->name('home');
 
Route::resource('blog', BlogController::class);
Route::get('blog/category/{slug}', [BlogController::class, 'postsByCategory'])->name('blog.category');
Route::post('blog/search', [BlogController::class, 'postsBySearch'])->name('blog.search');


Route::get('about', function (){
    return view('about');
})->name('about');
Route::get('contact', function (){
    return view('contact');
})->name('contact');
Route::get('terms', function (){
    return view('terms');
})->name('terms');
Route::get('privacy', function (){
    return view('privacy');
})->name('privacy');



Route::middleware('guest')->group(function () {
    Route::get('signup', [AuthController::class, 'signupFormShow'])->name('signup.show');
    Route::post('signup', [AuthController::class, 'register'])->name('signup.register');
    Route::get('login', [AuthController::class, 'LoginFormShow'])->name('login.show');
    Route::post('login', [AuthController::class, 'Login'])->name('login');
    Route::post('forgot-password', [AuthController::class, 'forgotPassword'])->name('forgotPassword');
    Route::get('forgot-password', [AuthController::class, 'forgotPasswordFormShow'])->name('forgotPassword.show');
    Route::get('reset-password/{token}', [AuthController::class, 'resetPasswordFormShow'])->name('password.reset');
    Route::post('reset-password', [AuthController::class, 'resetPassword'])->name('password.update');
});

Route::resource('categories', CategoryController::class);
Route::resource('tags', TagController::class);
Route::middleware('auth')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('posts', PostController::class);
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});