<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Genre;
use App\Models\Track;
use App\Models\Artist;
use App\Models\Contributor;
use Illuminate\Http\Request;
use App\Services\DeezerServices;
use App\Http\Resources\AlbumResource;

class AlbumController extends Controller
{
    public function show($id)
    {
        $album = Album::with(['genre', 'artist', 'contributor', 'tracks'])->find($id);

        if (!$album) {
            $album = resolve(DeezerServices::class)->find_album($id);
            $album = json_decode($album, true);
            $this->saveArtist($album["artist"],$album["contributors"][0]);
            $this->saveGenres($album["genres"]["data"]);
            $this->saveAlbum($album);
            $this->saveTracks($album["tracks"]["data"], $album["id"], $album["artist"]["id"]);
            $this->saveContributors($album["contributors"], $album["id"]);
            return response($album);
        }
        
        return new AlbumResource($album);
    }

    private function saveArtist($artistData, $contributorData) 
    {
        $artistData["link"] = $contributorData["link"];
        $artistData["share"] = $contributorData["share"];
        Artist::firstOrCreate(['id' => $artistData["id"]], (array) $artistData);
    }

    private function saveGenres($genres) 
    {
        foreach ($genres as $genre) {
            Genre::firstOrCreate(['id' => $genre["id"]], (array) $genre);
        }
    }

    private function saveAlbum($albumData) 
    {
        Album::firstOrCreate(
            ['id' => $albumData["id"]],
            (array) $albumData + ['artist_id' => $albumData["artist"]["id"]]
        );
    }

    private function saveTracks($tracks, $albumId, $artistId) 
    {
        foreach ($tracks as $track) {
            Track::firstOrCreate(
                ['id' => $track["id"]],
                (array) $track + ['album_id' => $albumId, 'artist_id' => $artistId]
            );
        }
    }

    private function saveContributors($contributors, $albumId) 
    {
        foreach ($contributors as $contributor) {
            Contributor::firstOrCreate(
                ['album_id' => $albumId, 'artist_id' => $contributor["id"]],
                (array) $contributor + ['album_id' => $albumId, 'artist_id' => $contributor["id"]]
            );
        }
    }
}
