<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AccountController;

Route::get('/', [HomeController::class, 'index'])->name('home');
//Route::get('/home', [HomeController::class, 'index'])->name ('home');
Route::get('/account/register', [AccountController::class, 'registeration'])->name ('account.registeration');