<?php

namespace App\Services;

use App\Models\Artist;
use App\Models\Album;
use App\Models\Track;

class MusicService
{
    public function saveArtist($artistData) 
    {
        Artist::firstOrCreate(['id' => $artistData["id"]], (array) $artistData);
    }

    public function saveAlbum($albumData, $artistId) 
    {
        Album::firstOrCreate(
            ['id' => $albumData["id"]],
            (array) $albumData + ['artist_id' => $artistId]
        );
    }

    public function saveTracks($track, $albumId, $artistId) 
    {
        Track::firstOrCreate(
            ['id' => $track["id"]],
            (array) $track + ['album_id' => $albumId, 'artist_id' => $artistId]
        );
    }
}
