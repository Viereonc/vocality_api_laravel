<?php

namespace App\Http\Controllers;

use App\Http\Requests\SongRequest;
use App\Models\Song;
use Illuminate\Http\Request;

class SongController
{
    use ResponseController, FunctionController;

    public function showAll()
    {
        $song = Song::all();

        return $this->showResponse($song);
    }

    public function showSpesific($id)
    {
        $song = Song::find($id);

        if(!$song)
        {
            return $this->notFoundResponse();
        }   

        return $this->showResponse($song);
    }

    public function store(SongRequest $requset)
    {
        $dataSong = [
            'artist_id_foreign' => $requset->input('artist_id_foreign'),
            'album_id_foreign' => $requset->input('album_id_foreign'),
            'song_name' => $requset->input('song_name'),
            'song_duration' => $requset->input('song_duration'),
            'song_file_url' => $this->encode($requset->file('song_file_url')),
            'song_image_url' => $this->encode($requset->file('song_image_url')),
        ];

        Song::create($dataSong);

        return $this->postResponse($dataSong);
    }

    public function update(SongRequest $requset, $id)
    {
        $song= Song::find($id);

        if (!$song) {
            return $this->notFoundResponse();
        }

        $dataSong = [
            'artist_id_foreign' => $requset->input('artist_id_foreign'),
            'album_id_foreign' => $requset->input('album_id_foreign'),
            'song_name' => $requset->input('song_name'),
            'song_duration' => $requset->input('song_duration'),
            'song_image_url' => $this->encode($requset->file('song_image_url')),
        ];

        $song->update($dataSong);

        return $this->putResponse($dataSong);
    }

    public function delete($id)
    {
        $song = Song::find($id);

        if(!$song)
        {
            return $this->notFoundResponse();
        }

        return $this->deleteResponse();
    }
}
