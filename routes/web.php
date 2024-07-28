<?php

use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\BarangayAccountController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\PwdController;
use App\Http\Controllers\SoloParentController;
use App\Http\Controllers\DafacController;
use App\Http\Controllers\DaycareController;
use App\Http\Controllers\KababaihanController;
use App\Http\Controllers\KabataanController;
use App\Http\Controllers\AdminPwdController;
use App\Http\Controllers\AdminSoloParentController;
use App\Http\Controllers\AdminDafacController;
use App\Http\Controllers\AdminDaycareController;
use App\Http\Controllers\AdminFormController;
use App\Http\Controllers\AdminKababaihanController;
use App\Http\Controllers\AdminKabataanController;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::middleware('auth')->group(function () {
    // CHANGE PASS
    Route::get('/password', [PasswordController::class, 'index']);
    Route::put('/password', [PasswordController::class, 'update']);
});
Route::middleware('auth', 'CheckDefaultPassword')->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/', [HomeController::class, 'index']);

    // FOR ADMIN ACCOUNTS
    Route::middleware('CheckUserRole:admin')->group(function () {
        Route::resource('barangay-accounts', BarangayAccountController::class);

        Route::resource('admin_daycares', AdminDaycareController::class);
        Route::resource('admin_pwds', AdminPwdController::class);
        Route::resource('admin_solo_parents', AdminSoloParentController::class);
        Route::resource('admin_dafacs', AdminDafacController::class);
        Route::resource('admin_kabataans', AdminKabataanController::class);
        Route::resource('admin_kababaihans', AdminKababaihanController::class);

        Route::get('/forms/{id}', [AdminFormController::class, 'show']);
    });

    // FOR BARANGAY ACCOUNTS
    Route::middleware('CheckUserRole:barangay_account')->group(function () {
        Route::resource('daycares', DaycareController::class);
        Route::resource('pwds', PwdController::class);
        Route::resource('solo_parents', SoloParentController::class);
        Route::resource('dafacs', DafacController::class);
        Route::resource('kabataans', KabataanController::class);
        Route::resource('kababaihans', KababaihanController::class);
        // Route::resource('pdfs', PdfController::class);
    });
});
