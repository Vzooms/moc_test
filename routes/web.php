<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OTPController;

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

Route::get('/login', [Controller::class, 'goToLogin'])->name('login');
Route::post('/login/auth', [Controller::class, 'authenticate']);

Route::get('/otp', [OTPController::class, 'goToOTP']);
Route::post('/otp/validate', [OTPController::class, 'validatePhoneNumber']);

Route::get('/register', [Controller::class, 'goToRegister']);
Route::post('/register/auth', [Controller::class, 'register']);

Route::middleware(['auth'])->group(function () {
    Route::get('/', [Controller::class, 'goTohome']);
    Route::post('/logout', [Controller::class, 'logout']);
});

