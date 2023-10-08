<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlbumRequest;
use App\Models\Album;

class AlbumController
{
    use ResponseController, FunctionController;

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
            'album_image_url' => $this->encode($request->file('album_image_url')),
            'album_banner_url' => $this->encode($request->file('album_banner_url'))
        ];

        Album::create($dataAlbum);

        return $this->postResponse($dataAlbum);
    }

    public function update(AlbumRequest $request, $id)
    {
        $album = Album::find($id);
        
        if(!$album)
        {
            return $this->notFoundResponse();
        }

        $dataAlbum = [
            'artist_id_foreign' => $request->input('artist_id_foreign'),
            'album_name' => $request->input('album_name'),
            'album_created' => $request->input('album_created'), 
            'album_image_url' => $this->encode($request->file('album_image_url')),
            'album_banner_url' => $this->encode($request->file('album_banner_url'))
        ];

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
