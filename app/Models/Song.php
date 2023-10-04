<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $table = 'tb_songs';

    protected $fillable = [
        'artist_id_foreign', 
        'album_id_foreign', 
        'song_name', 
        'song_duration', 
        'song_file_url', 
        'song_image_url'
    ];

    public function artist()
    {
        return $this->belongsTo(Artist::class, 'artist_id_foreign', 'id');
    }

    public function album()
    {
        return $this->belongsTo(Albums::class, 'album_id_foreign', 'id');
    }

    use HasFactory;
}
