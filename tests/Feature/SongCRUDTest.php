<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use \Illuminate\Http\UploadedFile;
use Tests\TestCase;

class SongCRUDTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testGetAll()
    {
        $response = $this->get('http://127.0.0.1:8000/api/song/show');

        $response->assertStatus(200);
    }

    public function testGetId()
    {
        $response = $this->get('http://127.0.0.1:8000/api/song/show/1');

        $response->assertStatus(200);
    }

    public function testPost()
    {
        $imagePath = storage_path('SongImage.jpeg');

        $dataArtist = [
            'artist_id_foreign' => 2,
            'album_id_foreign' => 2,
            'song_name' => 'Moon',
            'song_duration' => 193,
            'song_file_url' => '',
            'song_image_url' => new UploadedFile($imagePath, 'test_image.jpeg', 'image/jpeg', null, true),
        ];

        $response = $this->post('http://127.0.0.1:8000/api/song/post', $dataArtist);

        $response->assertStatus(201);
        $this->assertDatabaseHas('tb_songs', ['song_name' => 'Moon']);
    }

    public function testUpdate()
    {
        $imagePath = storage_path('SongImage.jpeg');

        $dataArtist = [
            'artist_id_foreign' => 2,
            'album_id_foreign' => 2,
            'song_name' => 'MoonD',
            'song_duration' => 193,
            'song_file_url' => '',
            'song_image_url' => new UploadedFile($imagePath, 'test_image.jpeg', 'image/jpeg', null, true),
        ];

        $response = $this->post('http://127.0.0.1:8000/api/song/update/4', $dataArtist);

        $response->assertStatus(200);
        $this->assertDatabaseHas('tb_songs', ['song_name' => 'MoonD']);
    }

    public function testDelete()
    {
        $response = $this->delete('http://127.0.0.1:8000/api/song/delete/4');
        
        $response->assertStatus(200);
    }
}
