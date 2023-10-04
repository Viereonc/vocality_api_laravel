<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected $table = 'tb_artists';

    protected $fillable = [
        'artist_name', 
        'artist_country',
        'artist_debut', 
        'artist_image_url'
    ];

    public function album()
    {
        return $this->hasMany(Albums::class, 'artist_id_foreign', 'artist_name');
    }

    public function song()
    {
        return $this->hasMany(Songs::class, 'artist_id_foreign', 'artist_name');
    }

    use HasFactory;
}
