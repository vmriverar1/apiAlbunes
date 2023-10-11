<?php

namespace Tests\Feature;

use Mockery;
use Tests\TestCase;
use App\Models\Artist;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ArtistTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_api_artist_save_data(): void
    {
        $fakeArtistData = [
            "id" => 27,
            "name" => "Daft Punk",
            "link" => "https://www.deezer.com/artist/27",
            "share" => "https://www.deezer.com/artist/27?utm_source=deezer&utm_content=artist-27&utm_term=0_1697005150&utm_medium=web",
            "picture" => "https://api.deezer.com/artist/27/image",
            "picture_small" => "https://e-cdns-images.dzcdn.net/images/artist/f2bc007e9133c946ac3c3907ddc5d2ea/56x56-000000-80-0-0.jpg",
            "picture_medium" => "https://e-cdns-images.dzcdn.net/images/artist/f2bc007e9133c946ac3c3907ddc5d2ea/250x250-000000-80-0-0.jpg",
            "picture_big" => "https://e-cdns-images.dzcdn.net/images/artist/f2bc007e9133c946ac3c3907ddc5d2ea/500x500-000000-80-0-0.jpg",
            "picture_xl" => "https://e-cdns-images.dzcdn.net/images/artist/f2bc007e9133c946ac3c3907ddc5d2ea/1000x1000-000000-80-0-0.jpg",
            "nb_album" => 36,
            "nb_fan" => 4504491,
            "radio" => true,
            "tracklist" => "https://api.deezer.com/artist/27/top?limit=50",
            "type" => "artist"
        ];

        $mockedService = Mockery::mock(DeezerServices::class);
        $mockedService->shouldReceive('find_artist')->with('27')->andReturn($fakeArtistData);
        $this->app->instance(DeezerServices::class, $mockedService);
        $artist = resolve(DeezerServices::class)->find_artist('27');
        $this->assertEquals($fakeArtistData, $artist);

        $this->saveArtist($artist);
        
    }

    private function saveArtist($artistData) 
    {
        Artist::firstOrCreate(['id' => $artistData["id"]], (array) $artistData);
    }
}
