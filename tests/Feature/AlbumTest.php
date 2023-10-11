<?php

namespace Tests\Feature;

use Mockery;
use Tests\TestCase;
use App\Models\Album;
use App\Models\Genre;
use App\Models\Artist;
use App\Models\Contributor;
use App\Models\Track;
use App\Services\DeezerServices;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AlbumTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_api_album_save_data(): void
    {

        $fakeAlbumData = [
            "id" => 302127,
            "title" => "Discovery",
            "upc" => "724384960650",
            "link" => "https://www.deezer.com/album/302127",
            "share" => "https://www.deezer.com/album/302127?utm_source=deezer&utm_content=album-302127&utm_term=0_1697000615&utm_medium=web",
            "cover" => "https://api.deezer.com/album/302127/image",
            "cover_small" => "https://e-cdns-images.dzcdn.net/images/cover/2e018122cb56986277102d2041a592c8/56x56-000000-80-0-0.jpg",
            "cover_medium" => "https://e-cdns-images.dzcdn.net/images/cover/2e018122cb56986277102d2041a592c8/250x250-000000-80-0-0.jpg",
            "cover_big" => "https://e-cdns-images.dzcdn.net/images/cover/2e018122cb56986277102d2041a592c8/500x500-000000-80-0-0.jpg",
            "cover_xl" => "https://e-cdns-images.dzcdn.net/images/cover/2e018122cb56986277102d2041a592c8/1000x1000-000000-80-0-0.jpg",
            "md5_image" => "2e018122cb56986277102d2041a592c8",
            "genre_id" => 113,
            "genres" => [
                "data" => [
                    [
                        "id" => 113,
                        "name" => "Dance",
                        "picture" => "https://api.deezer.com/genre/113/image",
                        "type" => "genre"
                    ]
                ]
            ],
            "label" => "Daft Life Ltd./ADA France",
            "nb_tracks" => 14,
            "duration" => 3660,
            "fans" => 277348,
            "release_date" => "2001-03-07",
            "record_type" => "album",
            "available" => true,
            "tracklist" => "https://api.deezer.com/album/302127/tracks",
            "explicit_lyrics" => false,
            "explicit_content_lyrics" => 7,
            "explicit_content_cover" => 0,
            "contributors" => [
                [
                    "id" => 27,
                    "name" => "Daft Punk",
                    "link" => "https://www.deezer.com/artist/27",
                    "share" => "https://www.deezer.com/artist/27?utm_source=deezer&utm_content=artist-27&utm_term=0_1697000615&utm_medium=web",
                    "picture" => "https://api.deezer.com/artist/27/image",
                    "picture_small" => "https://e-cdns-images.dzcdn.net/images/artist/f2bc007e9133c946ac3c3907ddc5d2ea/56x56-000000-80-0-0.jpg",
                    "picture_medium" => "https://e-cdns-images.dzcdn.net/images/artist/f2bc007e9133c946ac3c3907ddc5d2ea/250x250-000000-80-0-0.jpg",
                    "picture_big" => "https://e-cdns-images.dzcdn.net/images/artist/f2bc007e9133c946ac3c3907ddc5d2ea/500x500-000000-80-0-0.jpg",
                    "picture_xl" => "https://e-cdns-images.dzcdn.net/images/artist/f2bc007e9133c946ac3c3907ddc5d2ea/1000x1000-000000-80-0-0.jpg",
                    "radio" => true,
                    "tracklist" => "https://api.deezer.com/artist/27/top?limit=50",
                    "type" => "artist",
                    "role" => "Main"
                ]
            ],
            "artist" => [
                "id" => 27,
                "name" => "Daft Punk",
                "picture" => "https://api.deezer.com/artist/27/image",
                "picture_small" => "https://e-cdns-images.dzcdn.net/images/artist/f2bc007e9133c946ac3c3907ddc5d2ea/56x56-000000-80-0-0.jpg",
                "picture_medium" => "https://e-cdns-images.dzcdn.net/images/artist/f2bc007e9133c946ac3c3907ddc5d2ea/250x250-000000-80-0-0.jpg",
                "picture_big" => "https://e-cdns-images.dzcdn.net/images/artist/f2bc007e9133c946ac3c3907ddc5d2ea/500x500-000000-80-0-0.jpg",
                "picture_xl" => "https://e-cdns-images.dzcdn.net/images/artist/f2bc007e9133c946ac3c3907ddc5d2ea/1000x1000-000000-80-0-0.jpg",
                "tracklist" => "https://api.deezer.com/artist/27/top?limit=50",
                "type" => "artist"
            ],
            "type" => "album",
            "tracks" => [
                "data" => [
                    [
                        "id" => 3135553,
                        "readable" => true,
                        "title" => "One More Time",
                        "title_short" => "One More Time",
                        "title_version" => "",
                        "link" => "https://www.deezer.com/track/3135553",
                        "duration" => 320,
                        "rank" => 894964,
                        "explicit_lyrics" => false,
                        "explicit_content_lyrics" => 0,
                        "explicit_content_cover" => 0,
                        "preview" => "https://cdns-preview-e.dzcdn.net/stream/c-e77d23e0c8ed7567a507a6d1b6a9ca1b-11.mp3",
                        "md5_image" => "2e018122cb56986277102d2041a592c8",
                        "artist" => [
                            "id" => 27,
                            "name" => "Daft Punk",
                            "tracklist" => "https://api.deezer.com/artist/27/top?limit=50",
                            "type" => "artist"
                        ],
                        "album" => [
                            "id" => 302127,
                            "title" => "Discovery",
                            "cover" => "https://api.deezer.com/album/302127/image",
                            "cover_small" => "https://e-cdns-images.dzcdn.net/images/cover/2e018122cb56986277102d2041a592c8/56x56-000000-80-0-0.jpg",
                            "cover_medium" => "https://e-cdns-images.dzcdn.net/images/cover/2e018122cb56986277102d2041a592c8/250x250-000000-80-0-0.jpg",
                            "cover_big" => "https://e-cdns-images.dzcdn.net/images/cover/2e018122cb56986277102d2041a592c8/500x500-000000-80-0-0.jpg",
                            "cover_xl" => "https://e-cdns-images.dzcdn.net/images/cover/2e018122cb56986277102d2041a592c8/1000x1000-000000-80-0-0.jpg",
                            "md5_image" => "2e018122cb56986277102d2041a592c8",
                            "tracklist" => "https://api.deezer.com/album/302127/tracks",
                            "type" => "album"
                        ],
                        "type" => "track"
                    ],
                    [
                        "id" => 3135554,
                        "readable" => true,
                        "title" => "Aerodynamic",
                        "title_short" => "Aerodynamic",
                        "title_version" => "",
                        "link" => "https://www.deezer.com/track/3135554",
                        "duration" => 212,
                        "rank" => 711544,
                        "explicit_lyrics" => false,
                        "explicit_content_lyrics" => 6,
                        "explicit_content_cover" => 0,
                        "preview" => "https://cdns-preview-b.dzcdn.net/stream/c-b2e0166bba75a78251d6dca9c9c3b41a-9.mp3",
                        "md5_image" => "2e018122cb56986277102d2041a592c8",
                        "artist" => [
                            "id" => 27,
                            "name" => "Daft Punk",
                            "tracklist" => "https://api.deezer.com/artist/27/top?limit=50",
                            "type" => "artist"
                        ],
                        "album" => [
                            "id" => 302127,
                            "title" => "Discovery",
                            "cover" => "https://api.deezer.com/album/302127/image",
                            "cover_small" => "https://e-cdns-images.dzcdn.net/images/cover/2e018122cb56986277102d2041a592c8/56x56-000000-80-0-0.jpg",
                            "cover_medium" => "https://e-cdns-images.dzcdn.net/images/cover/2e018122cb56986277102d2041a592c8/250x250-000000-80-0-0.jpg",
                            "cover_big" => "https://e-cdns-images.dzcdn.net/images/cover/2e018122cb56986277102d2041a592c8/500x500-000000-80-0-0.jpg",
                            "cover_xl" => "https://e-cdns-images.dzcdn.net/images/cover/2e018122cb56986277102d2041a592c8/1000x1000-000000-80-0-0.jpg",
                            "md5_image" => "2e018122cb56986277102d2041a592c8",
                            "tracklist" => "https://api.deezer.com/album/302127/tracks",
                            "type" => "album"
                        ],
                        "type" => "track"
                    ],
                    [
                        "id" => 3135555,
                        "readable" => true,
                        "title" => "Digital Love",
                        "title_short" => "Digital Love",
                        "title_version" => "",
                        "link" => "https://www.deezer.com/track/3135555",
                        "duration" => 301,
                        "rank" => 680417,
                        "explicit_lyrics" => false,
                        "explicit_content_lyrics" => 0,
                        "explicit_content_cover" => 0,
                        "preview" => "https://cdns-preview-0.dzcdn.net/stream/c-01ef0c4982c94b86c7c0e6b2a70dde4b-9.mp3",
                        "md5_image" => "2e018122cb56986277102d2041a592c8",
                        "artist" => [
                            "id" => 27,
                            "name" => "Daft Punk",
                            "tracklist" => "https://api.deezer.com/artist/27/top?limit=50",
                            "type" => "artist"
                        ],
                        "album" => [
                            "id" => 302127,
                            "title" => "Discovery",
                            "cover" => "https://api.deezer.com/album/302127/image",
                            "cover_small" => "https://e-cdns-images.dzcdn.net/images/cover/2e018122cb56986277102d2041a592c8/56x56-000000-80-0-0.jpg",
                            "cover_medium" => "https://e-cdns-images.dzcdn.net/images/cover/2e018122cb56986277102d2041a592c8/250x250-000000-80-0-0.jpg",
                            "cover_big" => "https://e-cdns-images.dzcdn.net/images/cover/2e018122cb56986277102d2041a592c8/500x500-000000-80-0-0.jpg",
                            "cover_xl" => "https://e-cdns-images.dzcdn.net/images/cover/2e018122cb56986277102d2041a592c8/1000x1000-000000-80-0-0.jpg",
                            "md5_image" => "2e018122cb56986277102d2041a592c8",
                            "tracklist" => "https://api.deezer.com/album/302127/tracks",
                            "type" => "album"
                        ],
                        "type" => "track"
                    ],
                    [
                        "id" => 3135556,
                        "readable" => true,
                        "title" => "Harder, Better, Faster, Stronger",
                        "title_short" => "Harder, Better, Faster, Stronger",
                        "title_version" => "",
                        "link" => "https://www.deezer.com/track/3135556",
                        "duration" => 224,
                        "rank" => 799459,
                        "explicit_lyrics" => false,
                        "explicit_content_lyrics" => 0,
                        "explicit_content_cover" => 0,
                        "preview" => "https://cdns-preview-d.dzcdn.net/stream/c-deda7fa9316d9e9e880d2c6207e92260-10.mp3",
                        "md5_image" => "2e018122cb56986277102d2041a592c8",
                        "artist" => [
                            "id" => 27,
                            "name" => "Daft Punk",
                            "tracklist" => "https://api.deezer.com/artist/27/top?limit=50",
                            "type" => "artist"
                        ],
                        "album" => [
                            "id" => 302127,
                            "title" => "Discovery",
                            "cover" => "https://api.deezer.com/album/302127/image",
                            "cover_small" => "https://e-cdns-images.dzcdn.net/images/cover/2e018122cb56986277102d2041a592c8/56x56-000000-80-0-0.jpg",
                            "cover_medium" => "https://e-cdns-images.dzcdn.net/images/cover/2e018122cb56986277102d2041a592c8/250x250-000000-80-0-0.jpg",
                            "cover_big" => "https://e-cdns-images.dzcdn.net/images/cover/2e018122cb56986277102d2041a592c8/500x500-000000-80-0-0.jpg",
                            "cover_xl" => "https://e-cdns-images.dzcdn.net/images/cover/2e018122cb56986277102d2041a592c8/1000x1000-000000-80-0-0.jpg",
                            "md5_image" => "2e018122cb56986277102d2041a592c8",
                            "tracklist" => "https://api.deezer.com/album/302127/tracks",
                            "type" => "album"
                        ],
                        "type" => "track"
                    ]
                ]
            ]
        ];

        $mockedService = Mockery::mock(DeezerServices::class);
        $mockedService->shouldReceive('find_album')->with('302127')->andReturn($fakeAlbumData);
        $this->app->instance(DeezerServices::class, $mockedService);
        $album = resolve(DeezerServices::class)->find_album('302127');
        $this->assertEquals($fakeAlbumData, $album);

        $this->saveArtist($album["artist"]);
        $this->saveGenres($album["genres"]["data"]);
        $this->saveAlbum($album);
        $this->saveTracks($album["tracks"]["data"], $album["id"], $album["artist"]["id"]);
        $this->saveContributors($album["contributors"], $album["id"]);
    }

    private function saveArtist($artistData) 
    {
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
