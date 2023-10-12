<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;
use App\Services\DeezerServices;
use App\Http\Resources\ArtistResource;

class ArtistController extends Controller
{
    public function show($id)
    {
        $artist = Artist::with(['albums'])->find($id);

        if (!$artist || is_null($artist->nb_album) || is_null($artist->nb_fan)) {
            $artist = resolve(DeezerServices::class)->find_artist($id);
            $artist = (is_array($artist)) ? $artist : json_decode($artist, true);
            Artist::updateOrCreate(['id' => $id], $artist);
            return response($artist);
        }

        return new ArtistResource($artist);

    }
}
