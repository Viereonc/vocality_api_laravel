<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tb_songs', function (Blueprint $table) {

            //Column Songs Tabel
            $table->id();
            $table->unsignedBigInteger('artist_id_foreign');
            $table->unsignedBigInteger('album_id_foreign');
            $table->string('song_name');
            $table->integer('song_duration');
            $table->string('song_file_url');
            $table->string('song_image_url')->nullable();
            $table->timestamps();

            //Foreign Key
            $table->foreign('artist_id_foreign')->references('id')->on('tb_artists')->cascadeOnDelete();
            $table->foreign('album_id_foreign')->references('id')->on('tb_albums')->cascadeOnDelete();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_songs');
    }
};
