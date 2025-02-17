<?php

use App\Http\Controllers\API\CompanyApiController;
use App\Http\Controllers\API\ProfessorApiController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Para logout se requiere que la petición esté autenticada
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

Route::middleware('auth:sanctum')->get('/professor', function (Request $request) {
    return $request->user(); // Devuelve los datos del profesor autenticado
});


// Rutas de los recursos de Company y Professor
Route::apiResource('companies', CompanyApiController::class);
Route::apiResource('professors', ProfessorApiController::class);
Route::get('users', [UserController::class, 'index']);
Route::get('users/{userId}', [UserController::class, 'show']);

