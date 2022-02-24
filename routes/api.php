<?php

use App\Http\Controllers\api\AuthController;
use Illuminate\Support\Facades\Route;




// Auth Routes
Route::prefix("auth")->group(function () {
    Route::post("/login", [AuthController::class, "login"]);
    Route::post("/register", [AuthController::class, "register"]);
    Route::post("/verify_otp", [AuthController::class, "verifyOtp"]);
    Route::post("/resend_otp", [AuthController::class, "resendOtp"]);
    Route::post("/set_name", [AuthController::class, "setName"]);
    Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth:user-api');
    Route::get('/user', [AuthController::class, 'user'])->middleware('auth:user-api');
    Route::get('auth-failed', [AuthController::class, 'authFailed'])->name('auth-failed');
});

