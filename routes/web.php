<?php

use App\Http\Controllers\admin\AdminAuthController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\ExtraController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\admin\ServiceController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::group(["prefix" => "admin"], function () {
    Route::get("/login", [AdminAuthController::class, "loginView"])->name("admin.login");
    Route::post("/login", [AdminAuthController::class, "login"]);

    Route::middleware("auth:admin")->name("admin.")->group(function () {
        Route::get("/logout", [AdminAuthController::class, "logout"]);
        Route::get("/dashboard", [DashboardController::class, "index"]);
        // Category CRUD
        Route::get("/categories", [CategoryController::class, "index"]);
        Route::get("/add_category", [CategoryController::class, "add"]);
        Route::post("/add_category", [CategoryController::class, "insert"]);
        Route::get("/edit_category/{id}", [CategoryController::class, "edit"]);
        Route::post("/update_category", [CategoryController::class, "update"]);
        Route::get("/delete_category/{id}", [CategoryController::class, "delete"]);
        // Service CRUD
        // Category CRUD
        Route::get("/services", [ServiceController::class, "index"]);
        Route::get("/add_service", [ServiceController::class, "add"]);
        Route::post("/add_service", [ServiceController::class, "insert"]);
        Route::get("/edit_service/{id}", [ServiceController::class, "edit"]);
        Route::post("/update_service", [ServiceController::class, "update"]);
        Route::get("/delete_service/{id}", [ServiceController::class, "delete"]);
        // Add Extras
        Route::get("/add_extras", [ExtraController::class, "index"]);
        Route::post("/add_extra", [ExtraController::class, "extra"]);
        Route::post("/add_about_us", [ExtraController::class, "aboutUs"]);
        Route::post("/add_privacy_policy", [ExtraController::class, "privacyPolicy"]);
        Route::post("/add_terms_and_conditions", [ExtraController::class, "termsAndConditions"]);
        // Edit Profile
        Route::get("/edit_profile", [ProfileController::class, "index"]);
        Route::post("/edit_profile", [ProfileController::class, "update"]);
    });
});
