<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Email\EmailController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/emails', [EmailController::class, 'index']);
    Route::post('/emails', [EmailController::class, 'store']);
    Route::get('/emails/{email}', [EmailController::class, 'show']);
    Route::put('/emails/{email}', [EmailController::class, 'update']);
    Route::delete('/emails/{email}', [EmailController::class, 'destroy']);
});
