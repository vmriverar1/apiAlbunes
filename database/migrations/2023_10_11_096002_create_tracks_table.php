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
        Schema::create('tracks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('album_id');
            $table->unsignedBigInteger('artist_id');
            $table->boolean('readable');
            $table->string('title');
            $table->string('title_short');
            $table->string('title_version')->nullable();
            $table->string('link');
            $table->integer('duration'); 
            $table->integer('rank'); 
            $table->boolean('explicit_lyrics');
            $table->boolean('explicit_content_lyrics');
            $table->boolean('explicit_content_cover');
            $table->string('preview');
            $table->string('md5_image')->nullable(); 
            $table->timestamps();

            $table->foreign('album_id')->references('id')->on('albums')->onDelete('cascade');
            $table->foreign('artist_id')->references('id')->on('artists')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tracks');
    }
};
