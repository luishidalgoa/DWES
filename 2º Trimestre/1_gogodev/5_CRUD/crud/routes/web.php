<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;


//Route::get('/note/hello', [NoteController::class, 'hello'])->name('note.hello');
//Route::get('/note/{id?}', [NoteController::class, 'index'])->name('note.index');
/*
Route::get('/note', [NoteController::class, 'index'])->name('note.index');
Route::get('/note/create', [NoteController::class, 'create'])->name('note.create');
Route::post('/note/store', [NoteController::class, 'store'])->name('note.store');

Route::get('/note/edit/{note}', [NoteController::class, 'edit'])->name('note.edit');
Route::put('/note/update/{note}', [NoteController::class, 'update'])->name('note.update');
Route::get('/note/show/{note}', [NoteController::class, 'show'])->name('note.show');

Route::delete('/note/destroy/{note}', [NoteController::class, 'destroy'])->name('note.destroy');
*/

Route::resource('/note',NoteController::class);