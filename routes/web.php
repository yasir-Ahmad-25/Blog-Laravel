<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



// index
Route::get('/', [BlogController::class, 'index'])->name('blogs.index');


// Authentication pages
Route::get('signup', [UserController::class, 'signup'])->name('blogs.signup');
Route::get('signin', [UserController::class, 'signin'])->name('blogs.signin');
