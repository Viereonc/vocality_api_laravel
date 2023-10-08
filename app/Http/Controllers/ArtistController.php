<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ResponseController;
use App\Http\Requests\ArtistRequest;
use App\Models\Artist;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Storage;

class ArtistController 
{
    use ResponseController, FunctionController;

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
            'artist_debut' => $request->input('artist_debut'),
            'artist_image_url' => $this->encode($request->file('artist_image_url')),
        ];

        Artist::create($dataArtist);

        return $this->postResponse($dataArtist);
    }

    public function update(ArtistRequest $request, $id)
    {
        $artist = Artist::find($id);

        if (!$artist) {
            return $this->notFoundResponse();
        }

        $dataArtist = [
            'artist_name' => $request->input('artist_name'),
            'artist_country' => $request->input('artist_country'),
            'artist_debut' => $request->input('artist_debut'),
            'artist_image_url' => $this->encode($request->file('artist_image_url')),
        ];

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
