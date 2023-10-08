<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use \Illuminate\Http\UploadedFile;
use Tests\TestCase;

class ArtistCRUDTest extends TestCase
{
    /**
     * A basic feature test example.
     */

    public function testGetAll()
    {
        $response = $this->get('http://127.0.0.1:8000/api/artist/show');

        $response->assertStatus(200);
    }

    public function testGetId()
    {
        $response = $this->get('http://127.0.0.1:8000/api/artist/show/1');

        $response->assertStatus(200);
    }

    public function testPost()
    {
        $imagePath = storage_path('Gawr Gura.jpg');

        $dataArtist = [
            'artist_name' => 'Gawr Gura',
            'artist_country' => 'English',
            'artist_debut' => '2020',
            'artist_image_url' => new UploadedFile($imagePath, 'test_image.jpg', 'image/jpeg', null, true),
        ];

        $response = $this->post('http://127.0.0.1:8000/api/artist/post', $dataArtist);

        $response->assertStatus(201);
        $this->assertDatabaseHas('tb_artists', ['artist_name' => 'Gawr Gura']);
    }

    public function testUpdate()
    {
        $imagePath = storage_path('Gawr Gura.jpg');

        $dataArtist = [
            'artist_name' => 'Gawr Gura CH',
            'artist_country' => 'English',
            'artist_debut' => '2020',
            'artist_image_url' => new UploadedFile($imagePath, 'test_image.jpg', 'image/jpeg', null, true),
        ];

        $response = $this->post('http://127.0.0.1:8000/api/artist/update/12', $dataArtist);

        $response->assertStatus(200);
        $this->assertDatabaseHas('tb_artists', ['artist_name' => 'Gawr Gura CH']);
    }

    public function testDelete()
    {
        $response = $this->delete('http://127.0.0.1:8000/api/artist/delete/12');
        
        $response->assertStatus(200);
    }
}
