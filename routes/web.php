<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;



Route::get('/', [IndexController::class, 'Index'])->name('index');
// Route::get('/cal', [IndexController::class, 'Cal'])->name('cal');
Route::get('/calculator', [IndexController::class, 'calculator'])->name('calculator');
Route::post('/store-calculation', [IndexController::class, 'storeCalculation'])->name('store-calculation');
Route::get('/output', [IndexController::class, 'Output'])->name('output');



// Authentication Routes
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login-form', [AuthController::class, 'login'])->name('login.post');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
