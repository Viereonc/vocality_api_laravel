<?php

namespace Tests\Feature;

use App\Models\Song;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use \Illuminate\Http\UploadedFile;
use Tests\TestCase;

class SongCRUDTest extends TestCase
{
    public function testGetAll()
    {
        $response = $this->get('http://127.0.0.1:8000/api/song/show');

        $response->assertStatus(200);
    }

    public function testGetId()
    {
        $latestId = Song::max('id');

        $response = $this->get("http://127.0.0.1:8000/api/song/show/$latestId");

        $response->assertStatus(200);
    }

    public function testPost()
    {
        $imagePath = storage_path('SongImage.jpeg');

        $dataSong = [
            'artist_id_foreign' => 2,
            'album_id_foreign' => 2,
            'song_name' => 'Moo',
            'song_duration' => 193,
            'song_file_url' => new UploadedFile($imagePath, 'test_image.jpeg', 'image/jpeg', null, true),
            'song_image_url' => new UploadedFile($imagePath, 'test_image.jpeg', 'image/jpeg', null, true),
        ];

        $response = $this->post('http://127.0.0.1:8000/api/song/post', $dataSong);

        $response->assertStatus(201);
        $this->assertDatabaseHas('tb_songs', ['song_name' => 'Moo']);
    }

    public function testUpdate()
    {
        $imagePath = storage_path('SongImage.jpeg');
        $latestId = Song::max('id');

        $dataSong = [
            'artist_id_foreign' => 2,
            'album_id_foreign' => 2,
            'song_name' => 'MoonD',
            'song_duration' => 193,
            'song_file_url' => new UploadedFile($imagePath, 'test_image.jpeg', 'image/jpeg', null, true),
            'song_image_url' => new UploadedFile($imagePath, 'test_image.jpeg', 'image/jpeg', null, true),
        ];

        $response = $this->post("http://127.0.0.1:8000/api/song/update/$latestId", $dataSong);

        $response->assertStatus(200);
        $this->assertDatabaseHas('tb_songs', ['song_name' => 'MoonD']);
    }

    public function testDelete()
    {
        $latestId = Song::max('id');

        $response = $this->delete("http://127.0.0.1:8000/api/song/delete/$latestId");
        
        $response->assertStatus(200);
    }
}
