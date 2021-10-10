<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\ComentController;
use App\Http\Controllers\UserController;

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


/*
|--------------------------------------------------------------------------
| NOTES Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [NotesController::class,'index'])->middleware('auth');
Route::get('/newnote', [NotesController::class,'newnote'])->middleware('auth');
Route::get('/publicnotes', [NotesController::class,'publicNote'])->middleware('auth');
Route::get('/shownote/{id}', [NotesController::class,'showNote'])->middleware('auth');
Route::post('/create', [NotesController::class,'createCodesform'])->middleware('auth');
Route::delete('note-delete/{id}', [NotesController::class,'deleteCodesForm'])->middleware('auth');
Route::put('note-edit/{id}', [NotesController::class,'editnote'])->middleware('auth');

/*
|------------------------------------------------------------------------------
|COMENT ROUTES
|------------------------------------------------------------------------------
*/

Route::get('/comentar-note/{id}/coment/{coment}', [ComentController::class,'postComent'])->middleware('auth');
Route::delete('/coment-delete/{id}/viewing-note/{note}', [ComentController::class,'deleteComentForm'])->middleware('auth');

/*
|------------------------------------------------------------------------------
|USER ROUTES
|------------------------------------------------------------------------------
*/
Route::get('user/{user}', [UserController::class, 'show'] );

/*
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
*/