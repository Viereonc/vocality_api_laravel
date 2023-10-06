<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlbumRequest;
use App\Models\Album;

class AlbumController
{
    use ResponseController;

    public function showAll()
    {
        $album = Album::all();

        return $this->showResponse($album);
    }

    public function showSpesific($id)
    {
        $album = Album::find($id);

        if(!$album)
        {
            return $this->notFoundResponse();
        }

        return $this->showResponse($album);
    }

    public function store(AlbumRequest $request)
    {
        $dataAlbum = [
            'artist_id_foreign' => $request->input('artist_id_foreign'),
            'album_name' => $request->input('album_name'),
            'album_created' => $request->input('album_created'), 
        ];

        Album::create($dataAlbum);

        return $this->postResponse($dataAlbum);
    }

    public function edit(AlbumRequest $request, $id)
    {
        $album = Album::find($id);

        $dataAlbum = [
            'artist_id_foreign' => $request->input('artist_id_foreign'),
            'album_name' => $request->input('album_name'),
            'album_created' => $request->input('album_created'), 
        ];

        if(!$album)
        {
            return $this->notFoundResponse();
        }

        $album->update($dataAlbum);

        return $this->putResponse($album);
    }

    public function delete($id)
    {
        $album = Album::find($id);
       
        if(!$album)
        {
            return $this->notFoundResponse();
        }

        $album->delete();

        return $this->deleteResponse();
    }
}
