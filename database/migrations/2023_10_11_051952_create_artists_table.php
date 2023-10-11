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
        Schema::create('artists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('link')->nullable();
            $table->text('share')->nullable();
            $table->string('picture')->nullable();
            $table->string('picture_small')->nullable();
            $table->string('picture_medium')->nullable();
            $table->string('picture_big')->nullable();
            $table->string('picture_xl')->nullable();
            $table->string('nb_album')->nullable();
            $table->string('nb_fan')->nullable();
            $table->boolean('radio')->default(false);
            $table->text('tracklist')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artists');
    }
};
