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

    public function showAll()
    {
        return $this->showResponse(Artist::all());
    }

    public function showSpesific($id)
    {
        $artist = Artist::find($id);

        if(!$artist)
        {
            return $this->notFoundResponse();
        }

        return $this->showResponse($artist);
    }

    public function store(ArtistRequest $request)
    {
        $dataArtist = [
            'artist_name' => $request->input('artist_name'),
            'artist_country' => $request->input('artist_country'),
            'artist_debut' => $request->input('artist_debut')
        ];

        if($request->hasFile('artist_image_url'))
        {
            $artistImage = $request->file('artist_image_url');
            $artistImageFile = Str::random() . '.' . $artistImage->getClientOriginalExtension();
            $artistImage->storeAs('public/assets/artist_images', $artistImageFile);
            $dataArtist['artist_image_url'] = $artistImage;
        }
        else
        {
           return $this->errorResponse();
        }

        Artist::create($dataArtist);

        return $this->postResponse($dataArtist);
    }

    public function edit(ArtistRequest $request, $id)
    {
        $artist = Artist::find($id);

        if(!$artist)
        {
            return $this->notFoundResponse();
        }

        $dataArtist = [
            'artist_name' => $request->input('artist_name'),
            'artist_country' => $request->input('artist_country'),
            'artist_debut' => $request->input('artist_debut')
        ];

        if($request->hasFile('artist_image_url'))
        {
            $artistImage = $request->file('artist_image_url');
            $artistImageFile = Str::random() . '.' . $artistImage->getClientOriginalExtension();
            $artistImage->storeAs('public/assets/artist_images', $artistImageFile);
            $dataArtist['artist_image_url'] = $artistImage;
        }
        else
        {
           return $this->errorResponse();
        }

        $artist->update($dataArtist);

        return $this->putResponse($dataArtist);
    }

    public function delete($id)
    {
        $artist = Artist::find($id);
        
        if(!$artist)
        {
            return $this->notFoundResponse();
        }

        $artist->delete();

        return $this->deleteResponse();
    }
}
