<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BackupTransactionController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post("/v1/auth/login", [AuthController::class, "login"]);

Route::get('/v1/backup-transaction', [BackupTransactionController::class, 'index'])->middleware('auth:sanctum');
Route::post('/v1/backup-transaction', [BackupTransactionController::class, 'store'])->middleware('auth:sanctum');
