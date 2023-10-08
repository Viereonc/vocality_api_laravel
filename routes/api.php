<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\SongController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('artist')->group(function () 
{
    Route::get('/show', [ArtistController::class, 'showAll']);

    Route::get('/show/{id}', [ArtistController::class, 'showSpesific']);

    Route::post('/post', [ArtistController::class, 'store']);

    Route::post('/update/{id}', [ArtistController::class, 'update']);

    Route::delete('/delete/{id}', [ArtistController::class, 'delete']);
});

Route::prefix('album')->group(function ()
{
    Route::get('/show', [AlbumController::class, 'showAll']);

    Route::get('/show/{id}', [AlbumController::class, 'showSpesific']);

    Route::post('/post', [AlbumController::class, 'store']);

    Route::post('/update/{id}', [AlbumController::class, 'update']);

    Route::delete('/delete/{id}', [AlbumController::class, 'delete']);
});

Route::prefix('song')->group(function () 
{
    Route::get('/show', [SongController::class, 'showAll']);

    Route::get('/show/{id}', [SongController::class, 'showSpesific']);

    Route::post('/post', [SongController::class, 'store']);

    Route::post('/update/{id}', [SongController::class, 'update']);

    Route::delete('/delete/{id}', [SongController::class, 'delete']);
});