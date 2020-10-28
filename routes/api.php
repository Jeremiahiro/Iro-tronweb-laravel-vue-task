<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WordsController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/words/{word}', [WordsController::class, 'index']);
// Route::get('/words/{id}', [WordsController::class, 'show']);
// Route::put('/words/{id}', [WordsController::class, 'update']);
// Route::delete('/words/{id}', [WordsController::class, 'destroy']);



