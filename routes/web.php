<?php

use App\Http\Controllers\BarangayAccountController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Auth::routes();


Route::get('/', [HomeController::class, 'index']);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware('auth', 'CheckUserRole:admin')->group( function (){
    Route::resource('barangay-accounts', BarangayAccountController::class);
});
