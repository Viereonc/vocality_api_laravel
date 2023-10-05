<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ResponseController;
use App\Http\Requests\ArtistRequest;
use App\Models\Artist;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ArtistController 
{
    use AuthorizesRequests, ResponseController;

    public function show()
    {
        
        return $this->showResponse(Artist::all());
    }

    public function store(ArtistRequest $request)
    {
        $dataArtist = [
            'artist_name' => $request->input('artist_name'),
            'artist_country' => $request->input('artist_country'),
            'artist_debut' => $request->input('artist_debut')
        ];

        //Validating image is file
        if($request->hasFile('artist_image_url'))
        {
            $artistImage = $request->file('artist_image_url');
            $artistImageFile = Str::random() . '.' . $artistImage->getClientOriginalExtension();
            $artistImage->storeAs('public/assets/artist_images', $artistImageFile);
            $dataArtist['artist_image_url'] = $artistImage;
        }
        else
        {
           
        }

        //Store to model database
        Artist::create($dataArtist);

        return $this->postResponse($dataArtist);
    }
}
