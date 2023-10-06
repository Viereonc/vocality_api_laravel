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

Route::get('artist/show', [ArtistController::class, 'showAll']);

Route::get('artist/show/{id}', [ArtistController::class, 'showSpesific']);

Route::post('artist/post', [ArtistController::class, 'store']);

Route::put('artist/edit/{id}', [ArtistController::class, 'edit']);

Route::delete('artist/delete/{id}', [ArtistController::class, 'delete']);

Route::get('album/show', [AlbumController::class, 'showAll']);

Route::get('album/show/{id}', [AlbumController::class, 'showSpesific']);

Route::post('album/post', [AlbumController::class, 'store']);

Route::put('album/edit/{id}', [AlbumController::class, 'edit']);

Route::delete('album/delete/{id}', [AlbumController::class, 'delete']);

Route::get('song/show', [SongController::class, 'showAll']);

Route::get('song/show/{id}', [SongController::class, 'showSpesific']);

Route::put('song/edit/{id}', [SongController::class, 'edit']);

Route::delete('song/delete/{id}', [SongController::class, 'delete']);