<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Track;
use App\Models\Artist;
use Illuminate\Http\Request;
use App\Models\SearchHistory;
use App\Services\DeezerServices;
use App\Http\Resources\TrackResource;
use App\Http\Resources\TrackCollection;
use Illuminate\Pagination\LengthAwarePaginator;

class TrackController extends Controller
{
    public function search(Request $request)
    {
        try {
            $data = $request->query('q');

            if ($this->isRecentSearch($data)) {
                $tracks = $this->getTracks($data);
                return new TrackCollection($tracks);
            }
            
            $results = $this->fetchAndSaveTracks($data);
            $this->updateSearchHistory($data);


            return response($this->paginateResults($results));
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while processing your request'], 500);
        }
    }

    private function isRecentSearch($data)
    {
        return SearchHistory::where('query', $data)
            ->where('searched_at', '>', now()->subDay())
            ->exists();
    }

    private function getTracks($data)
    {
        return Track::where('title', 'like', '%' . $data . '%')
            ->orWhere('title_short', 'like', '%' . $data . '%')
            ->orWhere('title_version', 'like', '%' . $data . '%')
            ->whereHas('artist', function ($query) use ($data) {
                $query->where('name', 'like', '%' . $data . '%');
            })
            ->orWhereHas('album', function ($query) use ($data) {
                $query->where('title', 'like', '%' . $data . '%');
            })
            ->with(['album', 'artist'])
            ->paginate(25);
    }

    private function fetchAndSaveTracks($data)
    {
        $results = [];
        $index = 0;
        
        do {
            $data_search = resolve(DeezerServices::class)->search($data, $index);
            $data_search = (is_array($data_search)) ? $data_search : json_decode($data_search, true);
            $results = array_merge($results, $data_search['data']);
            $index++;
            $data_search = resolve(DeezerServices::class)->search($data, $index);
            $data_search = (is_array($data_search)) ? $data_search : json_decode($data_search, true);
        } while ($data_search["data"] !== []);
            
        foreach ($results as $key => $track) {
            $this->saveArtist($track["artist"]);
            $this->saveAlbum($track["album"], $track["artist"]["id"]);
            $this->saveTracks($track, $track["album"]["id"], $track["artist"]["id"]);
        }

        return $results;
    }

    private function updateSearchHistory($data)
    {
        SearchHistory::updateOrCreate(
            ['query' => $data],
            ['searched_at' => now()]
        );
    }

    private function paginateResults($results)
    {
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $itemCollection = collect($results);
        $perPage = 25;
        $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
        $paginatedResults = new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);
        
        $paginatedResults->setPath(url()->current());

        return [
            'data' => $paginatedResults->items(),
            'total' => $paginatedResults->total(),
            'next' => $paginatedResults->nextPageUrl()
        ];
    }


    private function saveArtist($artistData) 
    {
        Artist::firstOrCreate(['id' => $artistData["id"]], (array) $artistData);
    }

    private function saveAlbum($albumData, $artistId) 
    {
        Album::firstOrCreate(
            ['id' => $albumData["id"]],
            (array) $albumData + ['artist_id' => $artistId]
        );
    }

    private function saveTracks($track, $albumId, $artistId) 
    {
        Track::firstOrCreate(
            ['id' => $track["id"]],
            (array) $track + ['album_id' => $albumId, 'artist_id' => $artistId]
        );
    }
}
