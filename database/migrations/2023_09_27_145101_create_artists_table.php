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
        Schema::create('tb_artists', function (Blueprint $table) {

            //Column Artists Tabel
            $table->id();
            $table->string('artist_name');
            $table->string('artist_country');
            $table->year('artist_debut');
            $table->string('artist_image_url')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_artists');
    }
};
