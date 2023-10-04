<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function album(Request $request)
    {
        $request->validate([
            'artist_id_foreign',
            'album_name',
            'album_created',
            'album_image_url',
            'album_banner_url'
        ]);

        $album = new 
    }
}
