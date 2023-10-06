<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;

class SongController
{
    use ResponseController;

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

    public function store()
    {
        $dataSong = [
            'artist_id_foreign' => '',
            'album_id_foreign' => '',
            'song_name' => '',
            'song_duration' => '',
        ];
    }

    public function edit($id)
    {
        
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
