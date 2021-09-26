<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\ComentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [NotesController::class,'index'])->middleware('auth');
Route::get('/newnote', [NotesController::class,'newnote'])->middleware('auth');
Route::get('/publicnotes', [NotesController::class,'publicNote'])->middleware('auth');
Route::get('/shownote/{id}', [NotesController::class,'showNote'])->middleware('auth');

//ajax comentar
Route::get('/comentar-note/{id}/coment/{coment}', [ComentController::class,'postComent'])->middleware('auth');

Route::post('/create', [NotesController::class,'createCodesform'])->middleware('auth');
Route::put('note-edit/{id}', [NotesController::class,'editnote'])->middleware('auth');
Route::delete('note-delete/{id}', [NotesController::class,'deleteCodesForm'])->middleware('auth');

//Route::delete('imagens/{id}',[ImagemController::class, 'destroy'])->middleware('auth');

/*
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
*/