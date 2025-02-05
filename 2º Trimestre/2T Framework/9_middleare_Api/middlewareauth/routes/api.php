<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExampleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/create', [AuthController::class, 'store'])->name('create');
Route::post('/login', [AuthController::class, 'loginUser'])->name('login');

//ruta para obtener un dato protegido, aprovechamos la de laravel.

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});