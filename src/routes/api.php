<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('createnodes', [ApiController::class, 'createCodes']);
Route::get('notes', [ApiController::class, 'Getnotes']);
Route::get('totalnotes', [ApiController::class, 'CountNotes']);
Route::get('totalNotesperUser', [ApiController::class, 'CountNotesPerUser']);
Route::get('notesUser/{id}', [ApiController::class, 'notesOfUser']);

/*
|--------------------------------------------------------------------------
| User API
|--------------------------------------------------------------------------
|*/

Route::get('adressUser/{id}', [UserController::class, 'adressofUser']);

/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/