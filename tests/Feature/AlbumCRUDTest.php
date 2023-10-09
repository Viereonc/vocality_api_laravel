<?php

namespace Tests\Feature;

use App\Models\Album;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use \Illuminate\Http\UploadedFile;
use Tests\TestCase;

class AlbumCRUDTest extends TestCase
{
    public function testGetAll()
    {
        $response = $this->get('http://127.0.0.1:8000/api/album/show');

        $response->assertStatus(200);
    }

    public function testGetId()
    {
        $latestId = Album::max('id');

        $response = $this->get("http://127.0.0.1:8000/api/album/show/$latestId");

        $response->assertStatus(200);
    }

    public function testPost()
    {
        $imagePath = storage_path('Gawr Gura.jpg');
        $bannerPath = storage_path('MikuBanner.jpeg');

        $dataAlbum = [
            'id' => 3,
            'artist_id_foreign' => 2,
            'album_name' => 'MIKUNOPOLIS in LOS ANGELES',
            'album_created' => '2011',
            'album_image_url' => new UploadedFile($imagePath, 'test_image.jpg', 'image/jpeg', null, true),
            'album_banner_url' => new UploadedFile($bannerPath, 'test_image.jpeg', 'image/jpeg', null, true),
        ];

        $response = $this->post('http://127.0.0.1:8000/api/album/post', $dataAlbum);

        $response->assertStatus(201);
        $this->assertDatabaseHas('tb_albums', ['album_name' => 'MIKUNOPOLIS in LOS ANGELES']);
    }

    public function testUpdate()
    {
        $imagePath = storage_path('Gawr Gura.jpg');
        $bannerPath = storage_path('MikuBanner.jpeg');
        $latestId = Album::max('id');

        $dataAlbum = [
            'artist_id_foreign' => 2,
            'album_name' => 'Gawr Gura CH',
            'album_created' => '2011',
            'album_image_url' => new UploadedFile($imagePath, 'test_image.jpg', 'image/jpeg', null, true),
            'album_banner_url' => new UploadedFile($bannerPath, 'test_image.jpeg', 'image/jpeg', null, true),
        ];

        $response = $this->post("http://127.0.0.1:8000/api/album/update/$latestId", $dataAlbum);

        $response->assertStatus(200);
        $this->assertDatabaseHas('tb_albums', ['album_name' => 'Gawr Gura CH']);
    }

    public function testDelete()
    {
        $latestId = Album::max('id');

        $response = $this->delete("http://127.0.0.1:8000/api/album/delete/$latestId");
        
        $response->assertStatus(200);
    }
}
