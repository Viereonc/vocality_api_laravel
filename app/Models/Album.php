<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table = 'tb_albums';

    protected $fillable = [
        'artist_id_foreign', 
        'album_name', 
        'album_created', 
        'album_image_url', 
        'album_banner_url'
    ];

    public function song()
    {
        return $this->hasMany(Song::class, 'album_id_foreign', 'id');
    }

    public function artist()
    {
        return $this->belongsTo(Artist::class, 'artist_id_foreign', 'id');
    }

    use HasFactory;
}
