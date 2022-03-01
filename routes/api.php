<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\CategoryController;
use App\Http\Controllers\api\CheckoutServiceController;
use App\Http\Controllers\api\EditProfileController;
use App\Http\Controllers\api\ReviewController;
use App\Http\Controllers\api\ServiceController;
use App\Http\Controllers\api\UserAddressController;
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

Route::middleware("auth:user-api")->group(function () {
    // Edit Profile
    Route::put("/user/{user}", [EditProfileController::class, "update"]);
    // UserAddress
    Route::resource("/user_addresses", UserAddressController::class);

    // Categories
    Route::get("/categories", [CategoryController::class, "index"]);
    // Services
    Route::post("/services", [ServiceController::class, "getByCategory"]);
    // Reviews
    Route::resource("/reviews", ReviewController::class);

    // CheckoutService
    Route::post("/checkout_service", [CheckoutServiceController::class, "store"]);

});

