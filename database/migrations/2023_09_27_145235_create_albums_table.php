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
        Schema::create('tb_albums', function (Blueprint $table) {

            //Column Albums Tabel
            $table->id();
            $table->unsignedBigInteger('artist_id_foreign');
            $table->string('album_name');
            $table->year('album_created');
            $table->string('album_image_url')->nullable();
            $table->string('album_banner_url')->nullable();
            $table->timestamps();

            //Foreign Key
            $table->foreign('artist_id_foreign', 'artist_name')->references('id')->on('tb_artists')->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_albums');
    }
};
