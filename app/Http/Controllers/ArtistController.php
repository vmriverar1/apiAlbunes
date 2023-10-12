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
        try {
            $artist = Artist::with(['albums'])->find($id);

            if (!$artist || is_null($artist->nb_album) || is_null($artist->nb_fan)) {
                $artist = resolve(DeezerServices::class)->find_artist($id);
                $artist = (is_array($artist)) ? $artist : json_decode($artist, true);
                Artist::updateOrCreate(['id' => $id], $artist);
                return response($artist);
            }

            return new ArtistResource($artist);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while processing your request'], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {

            $artist = Artist::findOrFail($id);
            $artist->update($request->all());

            return new ArtistResource($artist);

        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while updating the artist'], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $artist = Artist::findOrFail($id);
            
            $artist->delete();

            return response()->json(['message' => 'Artist deleted successfully'], 200);

        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while deleting the artist'], 500);
        }
    }
}
