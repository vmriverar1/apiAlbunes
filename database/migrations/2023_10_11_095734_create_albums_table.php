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
        Schema::create('albums', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('upc')->nullable();
            $table->string('link')->nullable();
            $table->text('share')->nullable();
            $table->string('cover')->nullable();
            $table->string('cover_small')->nullable();
            $table->string('cover_medium')->nullable();
            $table->string('cover_big')->nullable();
            $table->string('cover_xl')->nullable();
            $table->string('md5_image')->nullable();
            $table->foreignId('genre_id')->nullable()->constrained('genres')->onDelete('cascade');
            $table->string('label')->nullable();
            $table->integer('nb_tracks')->default(0);
            $table->integer('duration')->default(0); 
            $table->integer('fans')->default(0);
            $table->date('release_date')->nullable();
            $table->string('record_type')->nullable();
            $table->boolean('available')->default(true);
            $table->text('tracklist')->nullable();
            $table->boolean('explicit_lyrics')->default(false);
            $table->boolean('explicit_content_lyrics')->default(false);
            $table->boolean('explicit_content_cover')->default(false);
            $table->foreignId('artist_id')->constrained('artists')->onDelete('cascade');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('albums');
    }
};
