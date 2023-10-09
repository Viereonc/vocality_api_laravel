<?php

namespace Tests\Feature;

use App\Models\Artist;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use \Illuminate\Http\UploadedFile;
use Tests\TestCase;

class ArtistCRUDTest extends TestCase
{
    public function testGetAll()
    {
        $response = $this->get('http://127.0.0.1:8000/api/artist/show');

        $response->assertStatus(200);
    }

    public function testGetId()
    {
        $latestId = Artist::max('id');

        $response = $this->get("http://127.0.0.1:8000/api/artist/show/$latestId");

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
        $latestId = Artist::max('id');

        $dataArtist = [
            'artist_name' => 'Gawr Gura CH',
            'artist_country' => 'English',
            'artist_debut' => '2020',
            'artist_image_url' => new UploadedFile($imagePath, 'test_image.jpg', 'image/jpeg', null, true),
        ];

        $response = $this->post("http://127.0.0.1:8000/api/artist/update/$latestId", $dataArtist);

        $response->assertStatus(200);
        $this->assertDatabaseHas('tb_artists', ['artist_name' => 'Gawr Gura CH']);
    }

    public function testDelete()
    {
        $latestId = Artist::max('id');

        $response = $this->delete("http://127.0.0.1:8000/api/artist/delete/$latestId");
        
        $response->assertStatus(200);
    }
}
