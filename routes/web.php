<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



// index
Route::get('/', [BlogController::class, 'index'])->name('blogs.index');

// authenticated users can access these pages
Route::middleware('auth')->controller(UserController::class)->group(function(){
    Route::post('singout', [BlogController::class, 'singout'])->name('blogs.singout');
});


// non authenticated users can access these pages
Route::middleware('guest')->controller(UserController::class)->group(function(){
    // Authentication pages
    Route::get('signup', [UserController::class, 'signup'])->name('blogs.signup');
    Route::get('signin', [UserController::class, 'signin'])->name('blogs.signin');
    
    
    Route::post('create_user' , [UserController::class, 'create_user'])->name('blogs.create_user');
    Route::post('login_user' , [UserController::class, 'login_user'])->name('blogs.login_user');
});

