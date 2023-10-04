<?php

namespace App\Http\Controllers;

use App\Models\Artists;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    use AuthorizesRequests;

    public function store(Request $request)
    {
        $request->validate([
            'artist_name' => 'required',
            'artist_country' => 'required',
            'artist_debut' => 'required',
            'artist_image_url' => 'nullable',
        ]);

        if($request->hasFile('artist_image_url')){
            
        }
    }
}
