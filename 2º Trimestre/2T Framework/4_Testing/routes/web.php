<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProfessorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.index');
});

Route::resource('companys', CompanyController::class);
Route::resource('professors', ProfessorController::class);


Route::get('/index', function () {
    return view('layouts.index');
})->name('layouts.index');
