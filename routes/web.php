<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::get('/', [DashboardController::class, "index"])->middleware(['auth', 'verified'])->name('welcome');
Route::get('/dashboard', [DashboardController::class, "index"])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get("/users", [UserController::class, "index"])->name("users");
    Route::get("/users/create", [UserController::class, "create"])->name("users.create");
    Route::post("/users/create", [UserController::class, "store"])->name("users.store");
    Route::get("/users/edit/{user}", [UserController::class, "edit"])->name("users.edit");
    Route::put("/users/update/{user}", [UserController::class, "update"])->name("users.update");
});

require __DIR__ . '/auth.php';
