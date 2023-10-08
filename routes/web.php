<?php

use App\Models\Album;
use App\Models\Artist;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function() {
    
});

Route::get('/dashboard', function(){
    return view('a');
});

Route::get('/dashboard/album/{album}', function(Album $album){
    return view('view_music', [
        'album' => $album,
    ]);
});

Route::get('/testing/artist/{artist}', function(Artist $artist){
    return view('tasting_song', [
        'artist' => $artist,
    ]);
});
