<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use \Illuminate\Http\UploadedFile;
use Tests\TestCase;

class AlbumCRUDTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testGetAll()
    {
        $response = $this->get('http://127.0.0.1:8000/api/album/show');

        $response->assertStatus(200);
    }

    public function testGetId()
    {
        $response = $this->get('http://127.0.0.1:8000/api/album/show/1');

        $response->assertStatus(200);
    }

    public function testPost()
    {
        $imagePath = storage_path('Gawr Gura.jpg');
        $bannerPath = storage_path('MikuBanner.jpeg');

        $dataAlbum = [
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

        $dataAlbum = [
            'artist_id_foreign' => 2,
            'album_name' => 'Gawr Gura CH',
            'album_created' => '2011',
            'album_image_url' => new UploadedFile($imagePath, 'test_image.jpg', 'image/jpeg', null, true),
            'album_banner_url' => new UploadedFile($bannerPath, 'test_image.jpeg', 'image/jpeg', null, true),
        ];

        $response = $this->post('http://127.0.0.1:8000/api/album/update/3', $dataAlbum);

        $response->assertStatus(200);
        $this->assertDatabaseHas('tb_albums', ['album_name' => 'Gawr Gura CH']);
    }

    public function testDelete()
    {
        $response = $this->delete('http://127.0.0.1:8000/api/album/delete/3');
        
        $response->assertStatus(200);
    }
}
