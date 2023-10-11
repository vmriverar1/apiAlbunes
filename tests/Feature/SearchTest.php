<?php

namespace Tests\Feature;

use Mockery;
use Tests\TestCase;
use App\Models\Album;
use App\Models\Genre;
use App\Models\Track;
use App\Models\Artist;
use App\Models\Contributor;

class SearchTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_api_search_save_data(): void
    {
        $fakeSearchtData = [
            "data" => [
                [
                    "id" => 14886639,
                    "readable" => true,
                    "title" => "Yo Quisiera",
                    "title_short" => "Yo Quisiera",
                    "title_version" => "",
                    "link" => "https://www.deezer.com/track/14886639",
                    "duration" => 218,
                    "rank" => 633814,
                    "explicit_lyrics" => false,
                    "explicit_content_lyrics" => 0,
                    "explicit_content_cover" => 2,
                    "preview" => "https://cdns-preview-8.dzcdn.net/stream/c-844d2979f60e713c0ced79b1fe8cbd90-5.mp3",
                    "md5_image" => "97ce862e951858a9dad0635fbd6fa371",
                    "artist" => [
                        "id" => 4476,
                        "name" => "Reik",
                        "link" => "https://www.deezer.com/artist/4476",
                        "picture" => "https://api.deezer.com/artist/4476/image",
                        "picture_small" => "https://e-cdns-images.dzcdn.net/images/artist/29be55e8e02579984d89e06674c62e26/56x56-000000-80-0-0.jpg",
                        "picture_medium" => "https://e-cdns-images.dzcdn.net/images/artist/29be55e8e02579984d89e06674c62e26/250x250-000000-80-0-0.jpg",
                        "picture_big" => "https://e-cdns-images.dzcdn.net/images/artist/29be55e8e02579984d89e06674c62e26/500x500-000000-80-0-0.jpg",
                        "picture_xl" => "https://e-cdns-images.dzcdn.net/images/artist/29be55e8e02579984d89e06674c62e26/1000x1000-000000-80-0-0.jpg",
                        "tracklist" => "https://api.deezer.com/artist/4476/top?limit=50",
                        "type" => "artist"
                    ],
                    "album" => [
                        "id" => 611040,
                        "title" => "Reik",
                        "cover" => "https://api.deezer.com/album/611040/image",
                        "cover_small" => "https://e-cdns-images.dzcdn.net/images/cover/97ce862e951858a9dad0635fbd6fa371/56x56-000000-80-0-0.jpg",
                        "cover_medium" => "https://e-cdns-images.dzcdn.net/images/cover/97ce862e951858a9dad0635fbd6fa371/250x250-000000-80-0-0.jpg",
                        "cover_big" => "https://e-cdns-images.dzcdn.net/images/cover/97ce862e951858a9dad0635fbd6fa371/500x500-000000-80-0-0.jpg",
                        "cover_xl" => "https://e-cdns-images.dzcdn.net/images/cover/97ce862e951858a9dad0635fbd6fa371/1000x1000-000000-80-0-0.jpg",
                        "md5_image" => "97ce862e951858a9dad0635fbd6fa371",
                        "tracklist" => "https://api.deezer.com/album/611040/tracks",
                        "type" => "album"
                    ],
                    "type" => "track"
                ],
                [
                    "id" => 6608954,
                    "readable" => true,
                    "title" => "Noviembre Sin Ti",
                    "title_short" => "Noviembre Sin Ti",
                    "title_version" => "",
                    "link" => "https://www.deezer.com/track/6608954",
                    "duration" => 203,
                    "rank" => 690070,
                    "explicit_lyrics" => false,
                    "explicit_content_lyrics" => 0,
                    "explicit_content_cover" => 2,
                    "preview" => "https://cdns-preview-2.dzcdn.net/stream/c-2eea03407a05f01878177e79a177de42-5.mp3",
                    "md5_image" => "97ce862e951858a9dad0635fbd6fa371",
                    "artist" => [
                        "id" => 4476,
                        "name" => "Reik",
                        "link" => "https://www.deezer.com/artist/4476",
                        "picture" => "https://api.deezer.com/artist/4476/image",
                        "picture_small" => "https://e-cdns-images.dzcdn.net/images/artist/29be55e8e02579984d89e06674c62e26/56x56-000000-80-0-0.jpg",
                        "picture_medium" => "https://e-cdns-images.dzcdn.net/images/artist/29be55e8e02579984d89e06674c62e26/250x250-000000-80-0-0.jpg",
                        "picture_big" => "https://e-cdns-images.dzcdn.net/images/artist/29be55e8e02579984d89e06674c62e26/500x500-000000-80-0-0.jpg",
                        "picture_xl" => "https://e-cdns-images.dzcdn.net/images/artist/29be55e8e02579984d89e06674c62e26/1000x1000-000000-80-0-0.jpg",
                        "tracklist" => "https://api.deezer.com/artist/4476/top?limit=50",
                        "type" => "artist"
                    ],
                    "album" => [
                        "id" => 611040,
                        "title" => "Reik",
                        "cover" => "https://api.deezer.com/album/611040/image",
                        "cover_small" => "https://e-cdns-images.dzcdn.net/images/cover/97ce862e951858a9dad0635fbd6fa371/56x56-000000-80-0-0.jpg",
                        "cover_medium" => "https://e-cdns-images.dzcdn.net/images/cover/97ce862e951858a9dad0635fbd6fa371/250x250-000000-80-0-0.jpg",
                        "cover_big" => "https://e-cdns-images.dzcdn.net/images/cover/97ce862e951858a9dad0635fbd6fa371/500x500-000000-80-0-0.jpg",
                        "cover_xl" => "https://e-cdns-images.dzcdn.net/images/cover/97ce862e951858a9dad0635fbd6fa371/1000x1000-000000-80-0-0.jpg",
                        "md5_image" => "97ce862e951858a9dad0635fbd6fa371",
                        "tracklist" => "https://api.deezer.com/album/611040/tracks",
                        "type" => "album"
                    ],
                    "type" => "track"
                ],
                [
                    "id" => 126844199,
                    "readable" => true,
                    "title" => "Ya Me Enteré",
                    "title_short" => "Ya Me Enteré",
                    "title_version" => "",
                    "link" => "https://www.deezer.com/track/126844199",
                    "duration" => 204,
                    "rank" => 654442,
                    "explicit_lyrics" => false,
                    "explicit_content_lyrics" => 0,
                    "explicit_content_cover" => 1,
                    "preview" => "https://cdns-preview-0.dzcdn.net/stream/c-0981a88faa7f4020554fcb7bbac4ac1b-6.mp3",
                    "md5_image" => "37fd72a84a1290d873eba449556096d7",
                    "artist" => [
                        "id" => 4476,
                        "name" => "Reik",
                        "link" => "https://www.deezer.com/artist/4476",
                        "picture" => "https://api.deezer.com/artist/4476/image",
                        "picture_small" => "https://e-cdns-images.dzcdn.net/images/artist/29be55e8e02579984d89e06674c62e26/56x56-000000-80-0-0.jpg",
                        "picture_medium" => "https://e-cdns-images.dzcdn.net/images/artist/29be55e8e02579984d89e06674c62e26/250x250-000000-80-0-0.jpg",
                        "picture_big" => "https://e-cdns-images.dzcdn.net/images/artist/29be55e8e02579984d89e06674c62e26/500x500-000000-80-0-0.jpg",
                        "picture_xl" => "https://e-cdns-images.dzcdn.net/images/artist/29be55e8e02579984d89e06674c62e26/1000x1000-000000-80-0-0.jpg",
                        "tracklist" => "https://api.deezer.com/artist/4476/top?limit=50",
                        "type" => "artist"
                    ],
                    "album" => [
                        "id" => 13366351,
                        "title" => "Des/Amor",
                        "cover" => "https://api.deezer.com/album/13366351/image",
                        "cover_small" => "https://e-cdns-images.dzcdn.net/images/cover/37fd72a84a1290d873eba449556096d7/56x56-000000-80-0-0.jpg",
                        "cover_medium" => "https://e-cdns-images.dzcdn.net/images/cover/37fd72a84a1290d873eba449556096d7/250x250-000000-80-0-0.jpg",
                        "cover_big" => "https://e-cdns-images.dzcdn.net/images/cover/37fd72a84a1290d873eba449556096d7/500x500-000000-80-0-0.jpg",
                        "cover_xl" => "https://e-cdns-images.dzcdn.net/images/cover/37fd72a84a1290d873eba449556096d7/1000x1000-000000-80-0-0.jpg",
                        "md5_image" => "37fd72a84a1290d873eba449556096d7",
                        "tracklist" => "https://api.deezer.com/album/13366351/tracks",
                        "type" => "album"
                    ],
                    "type" => "track"
                ],
                [
                    "id" => 1139874522,
                    "readable" => true,
                    "title" => "Poco",
                    "title_short" => "Poco",
                    "title_version" => "",
                    "link" => "https://www.deezer.com/track/1139874522",
                    "duration" => 225,
                    "rank" => 632602,
                    "explicit_lyrics" => false,
                    "explicit_content_lyrics" => 0,
                    "explicit_content_cover" => 2,
                    "preview" => "https://cdns-preview-6.dzcdn.net/stream/c-66ca0211e06b7a4d74734c59299604bb-3.mp3",
                    "md5_image" => "4f9a85c459eba870bcc2ee1d41c603e3",
                    "artist" => [
                        "id" => 4476,
                        "name" => "Reik",
                        "link" => "https://www.deezer.com/artist/4476",
                        "picture" => "https://api.deezer.com/artist/4476/image",
                        "picture_small" => "https://e-cdns-images.dzcdn.net/images/artist/29be55e8e02579984d89e06674c62e26/56x56-000000-80-0-0.jpg",
                        "picture_medium" => "https://e-cdns-images.dzcdn.net/images/artist/29be55e8e02579984d89e06674c62e26/250x250-000000-80-0-0.jpg",
                        "picture_big" => "https://e-cdns-images.dzcdn.net/images/artist/29be55e8e02579984d89e06674c62e26/500x500-000000-80-0-0.jpg",
                        "picture_xl" => "https://e-cdns-images.dzcdn.net/images/artist/29be55e8e02579984d89e06674c62e26/1000x1000-000000-80-0-0.jpg",
                        "tracklist" => "https://api.deezer.com/artist/4476/top?limit=50",
                        "type" => "artist"
                    ],
                    "album" => [
                        "id" => 185840442,
                        "title" => "Poco",
                        "cover" => "https://api.deezer.com/album/185840442/image",
                        "cover_small" => "https://e-cdns-images.dzcdn.net/images/cover/4f9a85c459eba870bcc2ee1d41c603e3/56x56-000000-80-0-0.jpg",
                        "cover_medium" => "https://e-cdns-images.dzcdn.net/images/cover/4f9a85c459eba870bcc2ee1d41c603e3/250x250-000000-80-0-0.jpg",
                        "cover_big" => "https://e-cdns-images.dzcdn.net/images/cover/4f9a85c459eba870bcc2ee1d41c603e3/500x500-000000-80-0-0.jpg",
                        "cover_xl" => "https://e-cdns-images.dzcdn.net/images/cover/4f9a85c459eba870bcc2ee1d41c603e3/1000x1000-000000-80-0-0.jpg",
                        "md5_image" => "4f9a85c459eba870bcc2ee1d41c603e3",
                        "tracklist" => "https://api.deezer.com/album/185840442/tracks",
                        "type" => "album"
                    ],
                    "type" => "track"
                ],
                [
                    "id" => 6608950,
                    "readable" => true,
                    "title" => "Qué Vida la Mía",
                    "title_short" => "Qué Vida la Mía",
                    "title_version" => "",
                    "link" => "https://www.deezer.com/track/6608950",
                    "duration" => 171,
                    "rank" => 568068,
                    "explicit_lyrics" => false,
                    "explicit_content_lyrics" => 0,
                    "explicit_content_cover" => 2,
                    "preview" => "https://cdns-preview-a.dzcdn.net/stream/c-a304b5d62ce061b2de51ce6233b09299-5.mp3",
                    "md5_image" => "97ce862e951858a9dad0635fbd6fa371",
                    "artist" => [
                        "id" => 4476,
                        "name" => "Reik",
                        "link" => "https://www.deezer.com/artist/4476",
                        "picture" => "https://api.deezer.com/artist/4476/image",
                        "picture_small" => "https://e-cdns-images.dzcdn.net/images/artist/29be55e8e02579984d89e06674c62e26/56x56-000000-80-0-0.jpg",
                        "picture_medium" => "https://e-cdns-images.dzcdn.net/images/artist/29be55e8e02579984d89e06674c62e26/250x250-000000-80-0-0.jpg",
                        "picture_big" => "https://e-cdns-images.dzcdn.net/images/artist/29be55e8e02579984d89e06674c62e26/500x500-000000-80-0-0.jpg",
                        "picture_xl" => "https://e-cdns-images.dzcdn.net/images/artist/29be55e8e02579984d89e06674c62e26/1000x1000-000000-80-0-0.jpg",
                        "tracklist" => "https://api.deezer.com/artist/4476/top?limit=50",
                        "type" => "artist"
                    ],
                    "album" => [
                        "id" => 611040,
                        "title" => "Reik",
                        "cover" => "https://api.deezer.com/album/611040/image",
                        "cover_small" => "https://e-cdns-images.dzcdn.net/images/cover/97ce862e951858a9dad0635fbd6fa371/56x56-000000-80-0-0.jpg",
                        "cover_medium" => "https://e-cdns-images.dzcdn.net/images/cover/97ce862e951858a9dad0635fbd6fa371/250x250-000000-80-0-0.jpg",
                        "cover_big" => "https://e-cdns-images.dzcdn.net/images/cover/97ce862e951858a9dad0635fbd6fa371/500x500-000000-80-0-0.jpg",
                        "cover_xl" => "https://e-cdns-images.dzcdn.net/images/cover/97ce862e951858a9dad0635fbd6fa371/1000x1000-000000-80-0-0.jpg",
                        "md5_image" => "97ce862e951858a9dad0635fbd6fa371",
                        "tracklist" => "https://api.deezer.com/album/611040/tracks",
                        "type" => "album"
                    ],
                    "type" => "track"
                ],
                [
                    "id" => 13330877,
                    "readable" => true,
                    "title" => "Sabes",
                    "title_short" => "Sabes",
                    "title_version" => "",
                    "link" => "https://www.deezer.com/track/13330877",
                    "duration" => 221,
                    "rank" => 551122,
                    "explicit_lyrics" => false,
                    "explicit_content_lyrics" => 0,
                    "explicit_content_cover" => 0,
                    "preview" => "https://cdns-preview-a.dzcdn.net/stream/c-a82cf35e2e9f4a4ea4861c92ac4ff13b-6.mp3",
                    "md5_image" => "75667ab1c526ea6a141480991c3a87c1",
                    "artist" => [
                        "id" => 4476,
                        "name" => "Reik",
                        "link" => "https://www.deezer.com/artist/4476",
                        "picture" => "https://api.deezer.com/artist/4476/image",
                        "picture_small" => "https://e-cdns-images.dzcdn.net/images/artist/29be55e8e02579984d89e06674c62e26/56x56-000000-80-0-0.jpg",
                        "picture_medium" => "https://e-cdns-images.dzcdn.net/images/artist/29be55e8e02579984d89e06674c62e26/250x250-000000-80-0-0.jpg",
                        "picture_big" => "https://e-cdns-images.dzcdn.net/images/artist/29be55e8e02579984d89e06674c62e26/500x500-000000-80-0-0.jpg",
                        "picture_xl" => "https://e-cdns-images.dzcdn.net/images/artist/29be55e8e02579984d89e06674c62e26/1000x1000-000000-80-0-0.jpg",
                        "tracklist" => "https://api.deezer.com/artist/4476/top?limit=50",
                        "type" => "artist"
                    ],
                    "album" => [
                        "id" => 1221629,
                        "title" => "Secuencia",
                        "cover" => "https://api.deezer.com/album/1221629/image",
                        "cover_small" => "https://e-cdns-images.dzcdn.net/images/cover/75667ab1c526ea6a141480991c3a87c1/56x56-000000-80-0-0.jpg",
                        "cover_medium" => "https://e-cdns-images.dzcdn.net/images/cover/75667ab1c526ea6a141480991c3a87c1/250x250-000000-80-0-0.jpg",
                        "cover_big" => "https://e-cdns-images.dzcdn.net/images/cover/75667ab1c526ea6a141480991c3a87c1/500x500-000000-80-0-0.jpg",
                        "cover_xl" => "https://e-cdns-images.dzcdn.net/images/cover/75667ab1c526ea6a141480991c3a87c1/1000x1000-000000-80-0-0.jpg",
                        "md5_image" => "75667ab1c526ea6a141480991c3a87c1",
                        "tracklist" => "https://api.deezer.com/album/1221629/tracks",
                        "type" => "album"
                    ],
                    "type" => "track"
                ],
                [
                    "id" => 4211243,
                    "readable" => true,
                    "title" => "Inolvidable",
                    "title_short" => "Inolvidable",
                    "title_version" => "",
                    "link" => "https://www.deezer.com/track/4211243",
                    "duration" => 223,
                    "rank" => 576120,
                    "explicit_lyrics" => false,
                    "explicit_content_lyrics" => 0,
                    "explicit_content_cover" => 2,
                    "preview" => "https://cdns-preview-5.dzcdn.net/stream/c-52506dc2d8b02c9267aee0e17806b685-6.mp3",
                    "md5_image" => "caba4008e7e43ca6838e2ac3f026b871",
                    "artist" => [
                        "id" => 4476,
                        "name" => "Reik",
                        "link" => "https://www.deezer.com/artist/4476",
                        "picture" => "https://api.deezer.com/artist/4476/image",
                        "picture_small" => "https://e-cdns-images.dzcdn.net/images/artist/29be55e8e02579984d89e06674c62e26/56x56-000000-80-0-0.jpg",
                        "picture_medium" => "https://e-cdns-images.dzcdn.net/images/artist/29be55e8e02579984d89e06674c62e26/250x250-000000-80-0-0.jpg",
                        "picture_big" => "https://e-cdns-images.dzcdn.net/images/artist/29be55e8e02579984d89e06674c62e26/500x500-000000-80-0-0.jpg",
                        "picture_xl" => "https://e-cdns-images.dzcdn.net/images/artist/29be55e8e02579984d89e06674c62e26/1000x1000-000000-80-0-0.jpg",
                        "tracklist" => "https://api.deezer.com/artist/4476/top?limit=50",
                        "type" => "artist"
                    ],
                    "album" => [
                        "id" => 392248,
                        "title" => "Un Dia Mas (Edicion Especial)",
                        "cover" => "https://api.deezer.com/album/392248/image",
                        "cover_small" => "https://e-cdns-images.dzcdn.net/images/cover/caba4008e7e43ca6838e2ac3f026b871/56x56-000000-80-0-0.jpg",
                        "cover_medium" => "https://e-cdns-images.dzcdn.net/images/cover/caba4008e7e43ca6838e2ac3f026b871/250x250-000000-80-0-0.jpg",
                        "cover_big" => "https://e-cdns-images.dzcdn.net/images/cover/caba4008e7e43ca6838e2ac3f026b871/500x500-000000-80-0-0.jpg",
                        "cover_xl" => "https://e-cdns-images.dzcdn.net/images/cover/caba4008e7e43ca6838e2ac3f026b871/1000x1000-000000-80-0-0.jpg",
                        "md5_image" => "caba4008e7e43ca6838e2ac3f026b871",
                        "tracklist" => "https://api.deezer.com/album/392248/tracks",
                        "type" => "album"
                    ],
                    "type" => "track"
                ],
                [
                    "id" => 12852679,
                    "readable" => true,
                    "title" => "Creo en Ti",
                    "title_short" => "Creo en Ti",
                    "title_version" => "",
                    "link" => "https://www.deezer.com/track/12852679",
                    "duration" => 163,
                    "rank" => 558050,
                    "explicit_lyrics" => false,
                    "explicit_content_lyrics" => 0,
                    "explicit_content_cover" => 0,
                    "preview" => "https://cdns-preview-8.dzcdn.net/stream/c-828889bf6ee8028983578fa346e33e76-4.mp3",
                    "md5_image" => "a7bd2ce1d2601cd88c70682ac34c50b4",
                    "artist" => [
                        "id" => 4476,
                        "name" => "Reik",
                        "link" => "https://www.deezer.com/artist/4476",
                        "picture" => "https://api.deezer.com/artist/4476/image",
                        "picture_small" => "https://e-cdns-images.dzcdn.net/images/artist/29be55e8e02579984d89e06674c62e26/56x56-000000-80-0-0.jpg",
                        "picture_medium" => "https://e-cdns-images.dzcdn.net/images/artist/29be55e8e02579984d89e06674c62e26/250x250-000000-80-0-0.jpg",
                        "picture_big" => "https://e-cdns-images.dzcdn.net/images/artist/29be55e8e02579984d89e06674c62e26/500x500-000000-80-0-0.jpg",
                        "picture_xl" => "https://e-cdns-images.dzcdn.net/images/artist/29be55e8e02579984d89e06674c62e26/1000x1000-000000-80-0-0.jpg",
                        "tracklist" => "https://api.deezer.com/artist/4476/top?limit=50",
                        "type" => "artist"
                    ],
                    "album" => [
                        "id" => 1178879,
                        "title" => "Peligro",
                        "cover" => "https://api.deezer.com/album/1178879/image",
                        "cover_small" => "https://e-cdns-images.dzcdn.net/images/cover/a7bd2ce1d2601cd88c70682ac34c50b4/56x56-000000-80-0-0.jpg",
                        "cover_medium" => "https://e-cdns-images.dzcdn.net/images/cover/a7bd2ce1d2601cd88c70682ac34c50b4/250x250-000000-80-0-0.jpg",
                        "cover_big" => "https://e-cdns-images.dzcdn.net/images/cover/a7bd2ce1d2601cd88c70682ac34c50b4/500x500-000000-80-0-0.jpg",
                        "cover_xl" => "https://e-cdns-images.dzcdn.net/images/cover/a7bd2ce1d2601cd88c70682ac34c50b4/1000x1000-000000-80-0-0.jpg",
                        "md5_image" => "a7bd2ce1d2601cd88c70682ac34c50b4",
                        "tracklist" => "https://api.deezer.com/album/1178879/tracks",
                        "type" => "album"
                    ],
                    "type" => "track"
                ],
                [
                    "id" => 1549107112,
                    "readable" => true,
                    "title" => "Los Tragos",
                    "title_short" => "Los Tragos",
                    "title_version" => "",
                    "link" => "https://www.deezer.com/track/1549107112",
                    "duration" => 171,
                    "rank" => 480520,
                    "explicit_lyrics" => false,
                    "explicit_content_lyrics" => 0,
                    "explicit_content_cover" => 2,
                    "preview" => "https://cdns-preview-8.dzcdn.net/stream/c-808e1112694b2f860b37ea8ae853cf1e-3.mp3",
                    "md5_image" => "5ad222fb2cd287c5bdf78a675a3103a2",
                    "artist" => [
                        "id" => 4476,
                        "name" => "Reik",
                        "link" => "https://www.deezer.com/artist/4476",
                        "picture" => "https://api.deezer.com/artist/4476/image",
                        "picture_small" => "https://e-cdns-images.dzcdn.net/images/artist/29be55e8e02579984d89e06674c62e26/56x56-000000-80-0-0.jpg",
                        "picture_medium" => "https://e-cdns-images.dzcdn.net/images/artist/29be55e8e02579984d89e06674c62e26/250x250-000000-80-0-0.jpg",
                        "picture_big" => "https://e-cdns-images.dzcdn.net/images/artist/29be55e8e02579984d89e06674c62e26/500x500-000000-80-0-0.jpg",
                        "picture_xl" => "https://e-cdns-images.dzcdn.net/images/artist/29be55e8e02579984d89e06674c62e26/1000x1000-000000-80-0-0.jpg",
                        "tracklist" => "https://api.deezer.com/artist/4476/top?limit=50",
                        "type" => "artist"
                    ],
                    "album" => [
                        "id" => 271811832,
                        "title" => "Los Tragos",
                        "cover" => "https://api.deezer.com/album/271811832/image",
                        "cover_small" => "https://e-cdns-images.dzcdn.net/images/cover/5ad222fb2cd287c5bdf78a675a3103a2/56x56-000000-80-0-0.jpg",
                        "cover_medium" => "https://e-cdns-images.dzcdn.net/images/cover/5ad222fb2cd287c5bdf78a675a3103a2/250x250-000000-80-0-0.jpg",
                        "cover_big" => "https://e-cdns-images.dzcdn.net/images/cover/5ad222fb2cd287c5bdf78a675a3103a2/500x500-000000-80-0-0.jpg",
                        "cover_xl" => "https://e-cdns-images.dzcdn.net/images/cover/5ad222fb2cd287c5bdf78a675a3103a2/1000x1000-000000-80-0-0.jpg",
                        "md5_image" => "5ad222fb2cd287c5bdf78a675a3103a2",
                        "tracklist" => "https://api.deezer.com/album/271811832/tracks",
                        "type" => "album"
                    ],
                    "type" => "track"
                ],
                [
                    "id" => 850789932,
                    "readable" => true,
                    "title" => "Reiki",
                    "title_short" => "Reiki",
                    "title_version" => "",
                    "link" => "https://www.deezer.com/track/850789932",
                    "duration" => 132,
                    "rank" => 510324,
                    "explicit_lyrics" => false,
                    "explicit_content_lyrics" => 0,
                    "explicit_content_cover" => 2,
                    "preview" => "https://cdns-preview-a.dzcdn.net/stream/c-a71ecff2668def3a35e1681d8573d4e5-5.mp3",
                    "md5_image" => "582a4eda169575c1e810100ed4cd41a7",
                    "artist" => [
                        "id" => 12604445,
                        "name" => "regengeräusche zum einschlafen",
                        "link" => "https://www.deezer.com/artist/12604445",
                        "picture" => "https://api.deezer.com/artist/12604445/image",
                        "picture_small" => "https://e-cdns-images.dzcdn.net/images/artist/582a4eda169575c1e810100ed4cd41a7/56x56-000000-80-0-0.jpg",
                        "picture_medium" => "https://e-cdns-images.dzcdn.net/images/artist/582a4eda169575c1e810100ed4cd41a7/250x250-000000-80-0-0.jpg",
                        "picture_big" => "https://e-cdns-images.dzcdn.net/images/artist/582a4eda169575c1e810100ed4cd41a7/500x500-000000-80-0-0.jpg",
                        "picture_xl" => "https://e-cdns-images.dzcdn.net/images/artist/582a4eda169575c1e810100ed4cd41a7/1000x1000-000000-80-0-0.jpg",
                        "tracklist" => "https://api.deezer.com/artist/12604445/top?limit=50",
                        "type" => "artist"
                    ],
                    "album" => [
                        "id" => 126341682,
                        "title" => "Regengeräusche als Einschlafhilfe zur Entspannung und gegen Tinnitus",
                        "cover" => "https://api.deezer.com/album/126341682/image",
                        "cover_small" => "https://e-cdns-images.dzcdn.net/images/cover/582a4eda169575c1e810100ed4cd41a7/56x56-000000-80-0-0.jpg",
                        "cover_medium" => "https://e-cdns-images.dzcdn.net/images/cover/582a4eda169575c1e810100ed4cd41a7/250x250-000000-80-0-0.jpg",
                        "cover_big" => "https://e-cdns-images.dzcdn.net/images/cover/582a4eda169575c1e810100ed4cd41a7/500x500-000000-80-0-0.jpg",
                        "cover_xl" => "https://e-cdns-images.dzcdn.net/images/cover/582a4eda169575c1e810100ed4cd41a7/1000x1000-000000-80-0-0.jpg",
                        "md5_image" => "582a4eda169575c1e810100ed4cd41a7",
                        "tracklist" => "https://api.deezer.com/album/126341682/tracks",
                        "type" => "album"
                    ],
                    "type" => "track"
                ],
                [
                    "id" => 616987572,
                    "readable" => true,
                    "title" => "Un Año",
                    "title_short" => "Un Año",
                    "title_version" => "",
                    "link" => "https://www.deezer.com/track/616987572",
                    "duration" => 164,
                    "rank" => 609970,
                    "explicit_lyrics" => false,
                    "explicit_content_lyrics" => 0,
                    "explicit_content_cover" => 0,
                    "preview" => "https://cdns-preview-b.dzcdn.net/stream/c-b6bf3403d23bd8faf0db0547fcd8af16-8.mp3",
                    "md5_image" => "143e20e3ac76bd655a73949d7a9c50a3",
                    "artist" => [
                        "id" => 5266156,
                        "name" => "Sebastian Yatra",
                        "link" => "https://www.deezer.com/artist/5266156",
                        "picture" => "https://api.deezer.com/artist/5266156/image",
                        "picture_small" => "https://e-cdns-images.dzcdn.net/images/artist/539fe332a169400b816fb21e614e2ea5/56x56-000000-80-0-0.jpg",
                        "picture_medium" => "https://e-cdns-images.dzcdn.net/images/artist/539fe332a169400b816fb21e614e2ea5/250x250-000000-80-0-0.jpg",
                        "picture_big" => "https://e-cdns-images.dzcdn.net/images/artist/539fe332a169400b816fb21e614e2ea5/500x500-000000-80-0-0.jpg",
                        "picture_xl" => "https://e-cdns-images.dzcdn.net/images/artist/539fe332a169400b816fb21e614e2ea5/1000x1000-000000-80-0-0.jpg",
                        "tracklist" => "https://api.deezer.com/artist/5266156/top?limit=50",
                        "type" => "artist"
                    ],
                    "album" => [
                        "id" => 84231402,
                        "title" => "Un Año",
                        "cover" => "https://api.deezer.com/album/84231402/image",
                        "cover_small" => "https://e-cdns-images.dzcdn.net/images/cover/143e20e3ac76bd655a73949d7a9c50a3/56x56-000000-80-0-0.jpg",
                        "cover_medium" => "https://e-cdns-images.dzcdn.net/images/cover/143e20e3ac76bd655a73949d7a9c50a3/250x250-000000-80-0-0.jpg",
                        "cover_big" => "https://e-cdns-images.dzcdn.net/images/cover/143e20e3ac76bd655a73949d7a9c50a3/500x500-000000-80-0-0.jpg",
                        "cover_xl" => "https://e-cdns-images.dzcdn.net/images/cover/143e20e3ac76bd655a73949d7a9c50a3/1000x1000-000000-80-0-0.jpg",
                        "md5_image" => "143e20e3ac76bd655a73949d7a9c50a3",
                        "tracklist" => "https://api.deezer.com/album/84231402/tracks",
                        "type" => "album"
                    ],
                    "type" => "track"
                ],
                [
                    "id" => 1959982547,
                    "readable" => true,
                    "title" => "Reir",
                    "title_short" => "Reir",
                    "title_version" => "",
                    "link" => "https://www.deezer.com/track/1959982547",
                    "duration" => 141,
                    "rank" => 565045,
                    "explicit_lyrics" => false,
                    "explicit_content_lyrics" => 2,
                    "explicit_content_cover" => 2,
                    "preview" => "https://cdns-preview-5.dzcdn.net/stream/c-5a63fe90c38113d7101f7e78a5f2d36d-2.mp3",
                    "md5_image" => "c017f9e7c4652aa3a46a1c2307c2816f",
                    "artist" => [
                        "id" => 186304737,
                        "name" => "Saida Ronalov",
                        "link" => "https://www.deezer.com/artist/186304737",
                        "picture" => "https://api.deezer.com/artist/186304737/image",
                        "picture_small" => "https://e-cdns-images.dzcdn.net/images/artist/c017f9e7c4652aa3a46a1c2307c2816f/56x56-000000-80-0-0.jpg",
                        "picture_medium" => "https://e-cdns-images.dzcdn.net/images/artist/c017f9e7c4652aa3a46a1c2307c2816f/250x250-000000-80-0-0.jpg",
                        "picture_big" => "https://e-cdns-images.dzcdn.net/images/artist/c017f9e7c4652aa3a46a1c2307c2816f/500x500-000000-80-0-0.jpg",
                        "picture_xl" => "https://e-cdns-images.dzcdn.net/images/artist/c017f9e7c4652aa3a46a1c2307c2816f/1000x1000-000000-80-0-0.jpg",
                        "tracklist" => "https://api.deezer.com/artist/186304737/top?limit=50",
                        "type" => "artist"
                    ],
                    "album" => [
                        "id" => 365375737,
                        "title" => "Halamno",
                        "cover" => "https://api.deezer.com/album/365375737/image",
                        "cover_small" => "https://e-cdns-images.dzcdn.net/images/cover/c017f9e7c4652aa3a46a1c2307c2816f/56x56-000000-80-0-0.jpg",
                        "cover_medium" => "https://e-cdns-images.dzcdn.net/images/cover/c017f9e7c4652aa3a46a1c2307c2816f/250x250-000000-80-0-0.jpg",
                        "cover_big" => "https://e-cdns-images.dzcdn.net/images/cover/c017f9e7c4652aa3a46a1c2307c2816f/500x500-000000-80-0-0.jpg",
                        "cover_xl" => "https://e-cdns-images.dzcdn.net/images/cover/c017f9e7c4652aa3a46a1c2307c2816f/1000x1000-000000-80-0-0.jpg",
                        "md5_image" => "c017f9e7c4652aa3a46a1c2307c2816f",
                        "tracklist" => "https://api.deezer.com/album/365375737/tracks",
                        "type" => "album"
                    ],
                    "type" => "track"
                ],
                [
                    "id" => 13330879,
                    "readable" => true,
                    "title" => "Me Duele Amarte",
                    "title_short" => "Me Duele Amarte",
                    "title_version" => "",
                    "link" => "https://www.deezer.com/track/13330879",
                    "duration" => 193,
                    "rank" => 504491,
                    "explicit_lyrics" => false,
                    "explicit_content_lyrics" => 0,
                    "explicit_content_cover" => 0,
                    "preview" => "https://cdns-preview-2.dzcdn.net/stream/c-21cf209cdad9ce520f4cee5545f041ac-7.mp3",
                    "md5_image" => "75667ab1c526ea6a141480991c3a87c1",
                    "artist" => [
                        "id" => 4476,
                        "name" => "Reik",
                        "link" => "https://www.deezer.com/artist/4476",
                        "picture" => "https://api.deezer.com/artist/4476/image",
                        "picture_small" => "https://e-cdns-images.dzcdn.net/images/artist/29be55e8e02579984d89e06674c62e26/56x56-000000-80-0-0.jpg",
                        "picture_medium" => "https://e-cdns-images.dzcdn.net/images/artist/29be55e8e02579984d89e06674c62e26/250x250-000000-80-0-0.jpg",
                        "picture_big" => "https://e-cdns-images.dzcdn.net/images/artist/29be55e8e02579984d89e06674c62e26/500x500-000000-80-0-0.jpg",
                        "picture_xl" => "https://e-cdns-images.dzcdn.net/images/artist/29be55e8e02579984d89e06674c62e26/1000x1000-000000-80-0-0.jpg",
                        "tracklist" => "https://api.deezer.com/artist/4476/top?limit=50",
                        "type" => "artist"
                    ],
                    "album" => [
                        "id" => 1221629,
                        "title" => "Secuencia",
                        "cover" => "https://api.deezer.com/album/1221629/image",
                        "cover_small" => "https://e-cdns-images.dzcdn.net/images/cover/75667ab1c526ea6a141480991c3a87c1/56x56-000000-80-0-0.jpg",
                        "cover_medium" => "https://e-cdns-images.dzcdn.net/images/cover/75667ab1c526ea6a141480991c3a87c1/250x250-000000-80-0-0.jpg",
                        "cover_big" => "https://e-cdns-images.dzcdn.net/images/cover/75667ab1c526ea6a141480991c3a87c1/500x500-000000-80-0-0.jpg",
                        "cover_xl" => "https://e-cdns-images.dzcdn.net/images/cover/75667ab1c526ea6a141480991c3a87c1/1000x1000-000000-80-0-0.jpg",
                        "md5_image" => "75667ab1c526ea6a141480991c3a87c1",
                        "tracklist" => "https://api.deezer.com/album/1221629/tracks",
                        "type" => "album"
                    ],
                    "type" => "track"
                ],
                [
                    "id" => 682602682,
                    "readable" => true,
                    "title" => "Amigos Con Derechos",
                    "title_short" => "Amigos Con Derechos",
                    "title_version" => "",
                    "link" => "https://www.deezer.com/track/682602682",
                    "duration" => 227,
                    "rank" => 628511,
                    "explicit_lyrics" => false,
                    "explicit_content_lyrics" => 0,
                    "explicit_content_cover" => 2,
                    "preview" => "https://cdns-preview-a.dzcdn.net/stream/c-ade72acda4c0d3753bc0d6cd3294ddde-5.mp3",
                    "md5_image" => "38d62ff916ca1c2abd2f0869bf6bd587",
                    "artist" => [
                        "id" => 4476,
                        "name" => "Reik",
                        "link" => "https://www.deezer.com/artist/4476",
                        "picture" => "https://api.deezer.com/artist/4476/image",
                        "picture_small" => "https://e-cdns-images.dzcdn.net/images/artist/29be55e8e02579984d89e06674c62e26/56x56-000000-80-0-0.jpg",
                        "picture_medium" => "https://e-cdns-images.dzcdn.net/images/artist/29be55e8e02579984d89e06674c62e26/250x250-000000-80-0-0.jpg",
                        "picture_big" => "https://e-cdns-images.dzcdn.net/images/artist/29be55e8e02579984d89e06674c62e26/500x500-000000-80-0-0.jpg",
                        "picture_xl" => "https://e-cdns-images.dzcdn.net/images/artist/29be55e8e02579984d89e06674c62e26/1000x1000-000000-80-0-0.jpg",
                        "tracklist" => "https://api.deezer.com/artist/4476/top?limit=50",
                        "type" => "artist"
                    ],
                    "album" => [
                        "id" => 97530492,
                        "title" => "Ahora",
                        "cover" => "https://api.deezer.com/album/97530492/image",
                        "cover_small" => "https://e-cdns-images.dzcdn.net/images/cover/38d62ff916ca1c2abd2f0869bf6bd587/56x56-000000-80-0-0.jpg",
                        "cover_medium" => "https://e-cdns-images.dzcdn.net/images/cover/38d62ff916ca1c2abd2f0869bf6bd587/250x250-000000-80-0-0.jpg",
                        "cover_big" => "https://e-cdns-images.dzcdn.net/images/cover/38d62ff916ca1c2abd2f0869bf6bd587/500x500-000000-80-0-0.jpg",
                        "cover_xl" => "https://e-cdns-images.dzcdn.net/images/cover/38d62ff916ca1c2abd2f0869bf6bd587/1000x1000-000000-80-0-0.jpg",
                        "md5_image" => "38d62ff916ca1c2abd2f0869bf6bd587",
                        "tracklist" => "https://api.deezer.com/album/97530492/tracks",
                        "type" => "album"
                    ],
                    "type" => "track"
                ],
                [
                    "id" => 851923812,
                    "readable" => true,
                    "title" => "Rein",
                    "title_short" => "Rein",
                    "title_version" => "",
                    "link" => "https://www.deezer.com/track/851923812",
                    "duration" => 260,
                    "rank" => 230508,
                    "explicit_lyrics" => false,
                    "explicit_content_lyrics" => 0,
                    "explicit_content_cover" => 2,
                    "preview" => "https://cdns-preview-a.dzcdn.net/stream/c-ab85730445d9778e4a235f7fca45c1aa-5.mp3",
                    "md5_image" => "5ba2f295a286c684a7957a906f7a8158",
                    "artist" => [
                        "id" => 4019,
                        "name" => "Katatonia",
                        "link" => "https://www.deezer.com/artist/4019",
                        "picture" => "https://api.deezer.com/artist/4019/image",
                        "picture_small" => "https://e-cdns-images.dzcdn.net/images/artist/9a40ef1ef33fbeef528ef7191dceca7f/56x56-000000-80-0-0.jpg",
                        "picture_medium" => "https://e-cdns-images.dzcdn.net/images/artist/9a40ef1ef33fbeef528ef7191dceca7f/250x250-000000-80-0-0.jpg",
                        "picture_big" => "https://e-cdns-images.dzcdn.net/images/artist/9a40ef1ef33fbeef528ef7191dceca7f/500x500-000000-80-0-0.jpg",
                        "picture_xl" => "https://e-cdns-images.dzcdn.net/images/artist/9a40ef1ef33fbeef528ef7191dceca7f/1000x1000-000000-80-0-0.jpg",
                        "tracklist" => "https://api.deezer.com/artist/4019/top?limit=50",
                        "type" => "artist"
                    ],
                    "album" => [
                        "id" => 126613382,
                        "title" => "City Burials",
                        "cover" => "https://api.deezer.com/album/126613382/image",
                        "cover_small" => "https://e-cdns-images.dzcdn.net/images/cover/5ba2f295a286c684a7957a906f7a8158/56x56-000000-80-0-0.jpg",
                        "cover_medium" => "https://e-cdns-images.dzcdn.net/images/cover/5ba2f295a286c684a7957a906f7a8158/250x250-000000-80-0-0.jpg",
                        "cover_big" => "https://e-cdns-images.dzcdn.net/images/cover/5ba2f295a286c684a7957a906f7a8158/500x500-000000-80-0-0.jpg",
                        "cover_xl" => "https://e-cdns-images.dzcdn.net/images/cover/5ba2f295a286c684a7957a906f7a8158/1000x1000-000000-80-0-0.jpg",
                        "md5_image" => "5ba2f295a286c684a7957a906f7a8158",
                        "tracklist" => "https://api.deezer.com/album/126613382/tracks",
                        "type" => "album"
                    ],
                    "type" => "track"
                ],
                [
                    "id" => 1752389497,
                    "readable" => true,
                    "title" => "Rein",
                    "title_short" => "Rein",
                    "title_version" => "",
                    "link" => "https://www.deezer.com/track/1752389497",
                    "duration" => 190,
                    "rank" => 409488,
                    "explicit_lyrics" => false,
                    "explicit_content_lyrics" => 0,
                    "explicit_content_cover" => 2,
                    "preview" => "https://cdns-preview-f.dzcdn.net/stream/c-f199b006b535894d2dc1f5e70496863b-3.mp3",
                    "md5_image" => "944165b13768008947b43346f87322f0",
                    "artist" => [
                        "id" => 100263162,
                        "name" => "Obam's",
                        "link" => "https://www.deezer.com/artist/100263162",
                        "picture" => "https://api.deezer.com/artist/100263162/image",
                        "picture_small" => "https://e-cdns-images.dzcdn.net/images/artist/944165b13768008947b43346f87322f0/56x56-000000-80-0-0.jpg",
                        "picture_medium" => "https://e-cdns-images.dzcdn.net/images/artist/944165b13768008947b43346f87322f0/250x250-000000-80-0-0.jpg",
                        "picture_big" => "https://e-cdns-images.dzcdn.net/images/artist/944165b13768008947b43346f87322f0/500x500-000000-80-0-0.jpg",
                        "picture_xl" => "https://e-cdns-images.dzcdn.net/images/artist/944165b13768008947b43346f87322f0/1000x1000-000000-80-0-0.jpg",
                        "tracklist" => "https://api.deezer.com/artist/100263162/top?limit=50",
                        "type" => "artist"
                    ],
                    "album" => [
                        "id" => 318938457,
                        "title" => "Rein",
                        "cover" => "https://api.deezer.com/album/318938457/image",
                        "cover_small" => "https://e-cdns-images.dzcdn.net/images/cover/944165b13768008947b43346f87322f0/56x56-000000-80-0-0.jpg",
                        "cover_medium" => "https://e-cdns-images.dzcdn.net/images/cover/944165b13768008947b43346f87322f0/250x250-000000-80-0-0.jpg",
                        "cover_big" => "https://e-cdns-images.dzcdn.net/images/cover/944165b13768008947b43346f87322f0/500x500-000000-80-0-0.jpg",
                        "cover_xl" => "https://e-cdns-images.dzcdn.net/images/cover/944165b13768008947b43346f87322f0/1000x1000-000000-80-0-0.jpg",
                        "md5_image" => "944165b13768008947b43346f87322f0",
                        "tracklist" => "https://api.deezer.com/album/318938457/tracks",
                        "type" => "album"
                    ],
                    "type" => "track"
                ],
                [
                    "id" => 974992082,
                    "readable" => true,
                    "title" => "La Bella y la Bestia",
                    "title_short" => "La Bella y la Bestia",
                    "title_version" => "",
                    "link" => "https://www.deezer.com/track/974992082",
                    "duration" => 186,
                    "rank" => 600197,
                    "explicit_lyrics" => false,
                    "explicit_content_lyrics" => 0,
                    "explicit_content_cover" => 2,
                    "preview" => "https://cdns-preview-3.dzcdn.net/stream/c-3a171cf2c992cd0c6ef1694c819de5a7-3.mp3",
                    "md5_image" => "261da691c31b675c918971740514f4ee",
                    "artist" => [
                        "id" => 4476,
                        "name" => "Reik",
                        "link" => "https://www.deezer.com/artist/4476",
                        "picture" => "https://api.deezer.com/artist/4476/image",
                        "picture_small" => "https://e-cdns-images.dzcdn.net/images/artist/29be55e8e02579984d89e06674c62e26/56x56-000000-80-0-0.jpg",
                        "picture_medium" => "https://e-cdns-images.dzcdn.net/images/artist/29be55e8e02579984d89e06674c62e26/250x250-000000-80-0-0.jpg",
                        "picture_big" => "https://e-cdns-images.dzcdn.net/images/artist/29be55e8e02579984d89e06674c62e26/500x500-000000-80-0-0.jpg",
                        "picture_xl" => "https://e-cdns-images.dzcdn.net/images/artist/29be55e8e02579984d89e06674c62e26/1000x1000-000000-80-0-0.jpg",
                        "tracklist" => "https://api.deezer.com/artist/4476/top?limit=50",
                        "type" => "artist"
                    ],
                    "album" => [
                        "id" => 151482212,
                        "title" => "La Bella y la Bestia",
                        "cover" => "https://api.deezer.com/album/151482212/image",
                        "cover_small" => "https://e-cdns-images.dzcdn.net/images/cover/261da691c31b675c918971740514f4ee/56x56-000000-80-0-0.jpg",
                        "cover_medium" => "https://e-cdns-images.dzcdn.net/images/cover/261da691c31b675c918971740514f4ee/250x250-000000-80-0-0.jpg",
                        "cover_big" => "https://e-cdns-images.dzcdn.net/images/cover/261da691c31b675c918971740514f4ee/500x500-000000-80-0-0.jpg",
                        "cover_xl" => "https://e-cdns-images.dzcdn.net/images/cover/261da691c31b675c918971740514f4ee/1000x1000-000000-80-0-0.jpg",
                        "md5_image" => "261da691c31b675c918971740514f4ee",
                        "tracklist" => "https://api.deezer.com/album/151482212/tracks",
                        "type" => "album"
                    ],
                    "type" => "track"
                ],
                [
                    "id" => 1877977487,
                    "readable" => true,
                    "title" => "5 Estrellas",
                    "title_short" => "5 Estrellas",
                    "title_version" => "",
                    "link" => "https://www.deezer.com/track/1877977487",
                    "duration" => 191,
                    "rank" => 585231,
                    "explicit_lyrics" => false,
                    "explicit_content_lyrics" => 0,
                    "explicit_content_cover" => 2,
                    "preview" => "https://cdns-preview-2.dzcdn.net/stream/c-2502c18a6bd20894c962772ad55be276-3.mp3",
                    "md5_image" => "9572733c08a55b7f3d17bcf2ad9b36e2",
                    "artist" => [
                        "id" => 4476,
                        "name" => "Reik",
                        "link" => "https://www.deezer.com/artist/4476",
                        "picture" => "https://api.deezer.com/artist/4476/image",
                        "picture_small" => "https://e-cdns-images.dzcdn.net/images/artist/29be55e8e02579984d89e06674c62e26/56x56-000000-80-0-0.jpg",
                        "picture_medium" => "https://e-cdns-images.dzcdn.net/images/artist/29be55e8e02579984d89e06674c62e26/250x250-000000-80-0-0.jpg",
                        "picture_big" => "https://e-cdns-images.dzcdn.net/images/artist/29be55e8e02579984d89e06674c62e26/500x500-000000-80-0-0.jpg",
                        "picture_xl" => "https://e-cdns-images.dzcdn.net/images/artist/29be55e8e02579984d89e06674c62e26/1000x1000-000000-80-0-0.jpg",
                        "tracklist" => "https://api.deezer.com/artist/4476/top?limit=50",
                        "type" => "artist"
                    ],
                    "album" => [
                        "id" => 349003507,
                        "title" => "5 Estrellas",
                        "cover" => "https://api.deezer.com/album/349003507/image",
                        "cover_small" => "https://e-cdns-images.dzcdn.net/images/cover/9572733c08a55b7f3d17bcf2ad9b36e2/56x56-000000-80-0-0.jpg",
                        "cover_medium" => "https://e-cdns-images.dzcdn.net/images/cover/9572733c08a55b7f3d17bcf2ad9b36e2/250x250-000000-80-0-0.jpg",
                        "cover_big" => "https://e-cdns-images.dzcdn.net/images/cover/9572733c08a55b7f3d17bcf2ad9b36e2/500x500-000000-80-0-0.jpg",
                        "cover_xl" => "https://e-cdns-images.dzcdn.net/images/cover/9572733c08a55b7f3d17bcf2ad9b36e2/1000x1000-000000-80-0-0.jpg",
                        "md5_image" => "9572733c08a55b7f3d17bcf2ad9b36e2",
                        "tracklist" => "https://api.deezer.com/album/349003507/tracks",
                        "type" => "album"
                    ],
                    "type" => "track"
                ],
                [
                    "id" => 791119182,
                    "readable" => true,
                    "title" => "Reis",
                    "title_short" => "Reis",
                    "title_version" => "",
                    "link" => "https://www.deezer.com/track/791119182",
                    "duration" => 167,
                    "rank" => 318553,
                    "explicit_lyrics" => false,
                    "explicit_content_lyrics" => 0,
                    "explicit_content_cover" => 2,
                    "preview" => "https://cdns-preview-8.dzcdn.net/stream/c-83f8ba249bf66d69116d067c08d8f272-5.mp3",
                    "md5_image" => "fd366ede01956e712b742c255b04e7d2",
                    "artist" => [
                        "id" => 4934011,
                        "name" => "Cacife Clandestino",
                        "link" => "https://www.deezer.com/artist/4934011",
                        "picture" => "https://api.deezer.com/artist/4934011/image",
                        "picture_small" => "https://e-cdns-images.dzcdn.net/images/artist/821172b07588164079bd0e9d49a4d9ca/56x56-000000-80-0-0.jpg",
                        "picture_medium" => "https://e-cdns-images.dzcdn.net/images/artist/821172b07588164079bd0e9d49a4d9ca/250x250-000000-80-0-0.jpg",
                        "picture_big" => "https://e-cdns-images.dzcdn.net/images/artist/821172b07588164079bd0e9d49a4d9ca/500x500-000000-80-0-0.jpg",
                        "picture_xl" => "https://e-cdns-images.dzcdn.net/images/artist/821172b07588164079bd0e9d49a4d9ca/1000x1000-000000-80-0-0.jpg",
                        "tracklist" => "https://api.deezer.com/artist/4934011/top?limit=50",
                        "type" => "artist"
                    ],
                    "album" => [
                        "id" => 116902402,
                        "title" => "Conteúdo Explícito, Pt. 2",
                        "cover" => "https://api.deezer.com/album/116902402/image",
                        "cover_small" => "https://e-cdns-images.dzcdn.net/images/cover/fd366ede01956e712b742c255b04e7d2/56x56-000000-80-0-0.jpg",
                        "cover_medium" => "https://e-cdns-images.dzcdn.net/images/cover/fd366ede01956e712b742c255b04e7d2/250x250-000000-80-0-0.jpg",
                        "cover_big" => "https://e-cdns-images.dzcdn.net/images/cover/fd366ede01956e712b742c255b04e7d2/500x500-000000-80-0-0.jpg",
                        "cover_xl" => "https://e-cdns-images.dzcdn.net/images/cover/fd366ede01956e712b742c255b04e7d2/1000x1000-000000-80-0-0.jpg",
                        "md5_image" => "fd366ede01956e712b742c255b04e7d2",
                        "tracklist" => "https://api.deezer.com/album/116902402/tracks",
                        "type" => "album"
                    ],
                    "type" => "track"
                ],
                [
                    "id" => 60764313,
                    "readable" => true,
                    "title" => "Peligro",
                    "title_short" => "Peligro",
                    "title_version" => "",
                    "link" => "https://www.deezer.com/track/60764313",
                    "duration" => 221,
                    "rank" => 475382,
                    "explicit_lyrics" => false,
                    "explicit_content_lyrics" => 0,
                    "explicit_content_cover" => 0,
                    "preview" => "https://cdns-preview-6.dzcdn.net/stream/c-6de6eac1294cfc6f1b898163873a9b04-4.mp3",
                    "md5_image" => "be31e784bb4b063b32217b4cae11bcd5",
                    "artist" => [
                        "id" => 4476,
                        "name" => "Reik",
                        "link" => "https://www.deezer.com/artist/4476",
                        "picture" => "https://api.deezer.com/artist/4476/image",
                        "picture_small" => "https://e-cdns-images.dzcdn.net/images/artist/29be55e8e02579984d89e06674c62e26/56x56-000000-80-0-0.jpg",
                        "picture_medium" => "https://e-cdns-images.dzcdn.net/images/artist/29be55e8e02579984d89e06674c62e26/250x250-000000-80-0-0.jpg",
                        "picture_big" => "https://e-cdns-images.dzcdn.net/images/artist/29be55e8e02579984d89e06674c62e26/500x500-000000-80-0-0.jpg",
                        "picture_xl" => "https://e-cdns-images.dzcdn.net/images/artist/29be55e8e02579984d89e06674c62e26/1000x1000-000000-80-0-0.jpg",
                        "tracklist" => "https://api.deezer.com/artist/4476/top?limit=50",
                        "type" => "artist"
                    ],
                    "album" => [
                        "id" => 5946047,
                        "title" => "Peligro",
                        "cover" => "https://api.deezer.com/album/5946047/image",
                        "cover_small" => "https://e-cdns-images.dzcdn.net/images/cover/be31e784bb4b063b32217b4cae11bcd5/56x56-000000-80-0-0.jpg",
                        "cover_medium" => "https://e-cdns-images.dzcdn.net/images/cover/be31e784bb4b063b32217b4cae11bcd5/250x250-000000-80-0-0.jpg",
                        "cover_big" => "https://e-cdns-images.dzcdn.net/images/cover/be31e784bb4b063b32217b4cae11bcd5/500x500-000000-80-0-0.jpg",
                        "cover_xl" => "https://e-cdns-images.dzcdn.net/images/cover/be31e784bb4b063b32217b4cae11bcd5/1000x1000-000000-80-0-0.jpg",
                        "md5_image" => "be31e784bb4b063b32217b4cae11bcd5",
                        "tracklist" => "https://api.deezer.com/album/5946047/tracks",
                        "type" => "album"
                    ],
                    "type" => "track"
                ],
                [
                    "id" => 1957530017,
                    "readable" => true,
                    "title" => "A Mi Lado",
                    "title_short" => "A Mi Lado",
                    "title_version" => "",
                    "link" => "https://www.deezer.com/track/1957530017",
                    "duration" => 197,
                    "rank" => 403143,
                    "explicit_lyrics" => false,
                    "explicit_content_lyrics" => 0,
                    "explicit_content_cover" => 2,
                    "preview" => "https://cdns-preview-0.dzcdn.net/stream/c-0b955a25455777ace72b2974ef056b7f-3.mp3",
                    "md5_image" => "e1c7761120a770d11a6ae37a55cf1b8d",
                    "artist" => [
                        "id" => 4476,
                        "name" => "Reik",
                        "link" => "https://www.deezer.com/artist/4476",
                        "picture" => "https://api.deezer.com/artist/4476/image",
                        "picture_small" => "https://e-cdns-images.dzcdn.net/images/artist/29be55e8e02579984d89e06674c62e26/56x56-000000-80-0-0.jpg",
                        "picture_medium" => "https://e-cdns-images.dzcdn.net/images/artist/29be55e8e02579984d89e06674c62e26/250x250-000000-80-0-0.jpg",
                        "picture_big" => "https://e-cdns-images.dzcdn.net/images/artist/29be55e8e02579984d89e06674c62e26/500x500-000000-80-0-0.jpg",
                        "picture_xl" => "https://e-cdns-images.dzcdn.net/images/artist/29be55e8e02579984d89e06674c62e26/1000x1000-000000-80-0-0.jpg",
                        "tracklist" => "https://api.deezer.com/artist/4476/top?limit=50",
                        "type" => "artist"
                    ],
                    "album" => [
                        "id" => 364908537,
                        "title" => "A Mi Lado",
                        "cover" => "https://api.deezer.com/album/364908537/image",
                        "cover_small" => "https://e-cdns-images.dzcdn.net/images/cover/e1c7761120a770d11a6ae37a55cf1b8d/56x56-000000-80-0-0.jpg",
                        "cover_medium" => "https://e-cdns-images.dzcdn.net/images/cover/e1c7761120a770d11a6ae37a55cf1b8d/250x250-000000-80-0-0.jpg",
                        "cover_big" => "https://e-cdns-images.dzcdn.net/images/cover/e1c7761120a770d11a6ae37a55cf1b8d/500x500-000000-80-0-0.jpg",
                        "cover_xl" => "https://e-cdns-images.dzcdn.net/images/cover/e1c7761120a770d11a6ae37a55cf1b8d/1000x1000-000000-80-0-0.jpg",
                        "md5_image" => "e1c7761120a770d11a6ae37a55cf1b8d",
                        "tracklist" => "https://api.deezer.com/album/364908537/tracks",
                        "type" => "album"
                    ],
                    "type" => "track"
                ],
                [
                    "id" => 889803822,
                    "readable" => true,
                    "title" => "Rei I",
                    "title_short" => "Rei I",
                    "title_version" => "",
                    "link" => "https://www.deezer.com/track/889803822",
                    "duration" => 179,
                    "rank" => 294831,
                    "explicit_lyrics" => false,
                    "explicit_content_lyrics" => 0,
                    "explicit_content_cover" => 2,
                    "preview" => "https://cdns-preview-1.dzcdn.net/stream/c-1e7dd1ecb215fccb293e13eaa68b60cd-3.mp3",
                    "md5_image" => "f6ab0b5f1acb0505619d87edeb78d118",
                    "artist" => [
                        "id" => 4663521,
                        "name" => "Shiro Sagisu",
                        "link" => "https://www.deezer.com/artist/4663521",
                        "picture" => "https://api.deezer.com/artist/4663521/image",
                        "picture_small" => "https://e-cdns-images.dzcdn.net/images/artist/3c1cdc9e3212627b86d567ea2623d154/56x56-000000-80-0-0.jpg",
                        "picture_medium" => "https://e-cdns-images.dzcdn.net/images/artist/3c1cdc9e3212627b86d567ea2623d154/250x250-000000-80-0-0.jpg",
                        "picture_big" => "https://e-cdns-images.dzcdn.net/images/artist/3c1cdc9e3212627b86d567ea2623d154/500x500-000000-80-0-0.jpg",
                        "picture_xl" => "https://e-cdns-images.dzcdn.net/images/artist/3c1cdc9e3212627b86d567ea2623d154/1000x1000-000000-80-0-0.jpg",
                        "tracklist" => "https://api.deezer.com/artist/4663521/top?limit=50",
                        "type" => "artist"
                    ],
                    "album" => [
                        "id" => 133928612,
                        "title" => "NEON GENESIS EVANGELION (Original Series Soundtrack)",
                        "cover" => "https://api.deezer.com/album/133928612/image",
                        "cover_small" => "https://e-cdns-images.dzcdn.net/images/cover/f6ab0b5f1acb0505619d87edeb78d118/56x56-000000-80-0-0.jpg",
                        "cover_medium" => "https://e-cdns-images.dzcdn.net/images/cover/f6ab0b5f1acb0505619d87edeb78d118/250x250-000000-80-0-0.jpg",
                        "cover_big" => "https://e-cdns-images.dzcdn.net/images/cover/f6ab0b5f1acb0505619d87edeb78d118/500x500-000000-80-0-0.jpg",
                        "cover_xl" => "https://e-cdns-images.dzcdn.net/images/cover/f6ab0b5f1acb0505619d87edeb78d118/1000x1000-000000-80-0-0.jpg",
                        "md5_image" => "f6ab0b5f1acb0505619d87edeb78d118",
                        "tracklist" => "https://api.deezer.com/album/133928612/tracks",
                        "type" => "album"
                    ],
                    "type" => "track"
                ],
                [
                    "id" => 2386401185,
                    "readable" => true,
                    "title" => "Te Acuerdas",
                    "title_short" => "Te Acuerdas",
                    "title_version" => "",
                    "link" => "https://www.deezer.com/track/2386401185",
                    "duration" => 205,
                    "rank" => 553455,
                    "explicit_lyrics" => false,
                    "explicit_content_lyrics" => 0,
                    "explicit_content_cover" => 2,
                    "preview" => "https://cdns-preview-0.dzcdn.net/stream/c-0e834c15561d2a065e8885debc7b2587-4.mp3",
                    "md5_image" => "c0d2fe708c719e1e9bef88759de5d5de",
                    "artist" => [
                        "id" => 183821,
                        "name" => "HA-ASH",
                        "link" => "https://www.deezer.com/artist/183821",
                        "picture" => "https://api.deezer.com/artist/183821/image",
                        "picture_small" => "https://e-cdns-images.dzcdn.net/images/artist/780585ffa88dfd7fbf78af0eb69f7c3d/56x56-000000-80-0-0.jpg",
                        "picture_medium" => "https://e-cdns-images.dzcdn.net/images/artist/780585ffa88dfd7fbf78af0eb69f7c3d/250x250-000000-80-0-0.jpg",
                        "picture_big" => "https://e-cdns-images.dzcdn.net/images/artist/780585ffa88dfd7fbf78af0eb69f7c3d/500x500-000000-80-0-0.jpg",
                        "picture_xl" => "https://e-cdns-images.dzcdn.net/images/artist/780585ffa88dfd7fbf78af0eb69f7c3d/1000x1000-000000-80-0-0.jpg",
                        "tracklist" => "https://api.deezer.com/artist/183821/top?limit=50",
                        "type" => "artist"
                    ],
                    "album" => [
                        "id" => 469632665,
                        "title" => "Te Acuerdas",
                        "cover" => "https://api.deezer.com/album/469632665/image",
                        "cover_small" => "https://e-cdns-images.dzcdn.net/images/cover/c0d2fe708c719e1e9bef88759de5d5de/56x56-000000-80-0-0.jpg",
                        "cover_medium" => "https://e-cdns-images.dzcdn.net/images/cover/c0d2fe708c719e1e9bef88759de5d5de/250x250-000000-80-0-0.jpg",
                        "cover_big" => "https://e-cdns-images.dzcdn.net/images/cover/c0d2fe708c719e1e9bef88759de5d5de/500x500-000000-80-0-0.jpg",
                        "cover_xl" => "https://e-cdns-images.dzcdn.net/images/cover/c0d2fe708c719e1e9bef88759de5d5de/1000x1000-000000-80-0-0.jpg",
                        "md5_image" => "c0d2fe708c719e1e9bef88759de5d5de",
                        "tracklist" => "https://api.deezer.com/album/469632665/tracks",
                        "type" => "album"
                    ],
                    "type" => "track"
                ],
                [
                    "id" => 126844193,
                    "readable" => true,
                    "title" => "Voy a Olvidarte",
                    "title_short" => "Voy a Olvidarte",
                    "title_version" => "",
                    "link" => "https://www.deezer.com/track/126844193",
                    "duration" => 199,
                    "rank" => 490589,
                    "explicit_lyrics" => false,
                    "explicit_content_lyrics" => 0,
                    "explicit_content_cover" => 1,
                    "preview" => "https://cdns-preview-3.dzcdn.net/stream/c-39d6df57e63caa226652025c8dee155c-6.mp3",
                    "md5_image" => "37fd72a84a1290d873eba449556096d7",
                    "artist" => [
                        "id" => 4476,
                        "name" => "Reik",
                        "link" => "https://www.deezer.com/artist/4476",
                        "picture" => "https://api.deezer.com/artist/4476/image",
                        "picture_small" => "https://e-cdns-images.dzcdn.net/images/artist/29be55e8e02579984d89e06674c62e26/56x56-000000-80-0-0.jpg",
                        "picture_medium" => "https://e-cdns-images.dzcdn.net/images/artist/29be55e8e02579984d89e06674c62e26/250x250-000000-80-0-0.jpg",
                        "picture_big" => "https://e-cdns-images.dzcdn.net/images/artist/29be55e8e02579984d89e06674c62e26/500x500-000000-80-0-0.jpg",
                        "picture_xl" => "https://e-cdns-images.dzcdn.net/images/artist/29be55e8e02579984d89e06674c62e26/1000x1000-000000-80-0-0.jpg",
                        "tracklist" => "https://api.deezer.com/artist/4476/top?limit=50",
                        "type" => "artist"
                    ],
                    "album" => [
                        "id" => 13366351,
                        "title" => "Des/Amor",
                        "cover" => "https://api.deezer.com/album/13366351/image",
                        "cover_small" => "https://e-cdns-images.dzcdn.net/images/cover/37fd72a84a1290d873eba449556096d7/56x56-000000-80-0-0.jpg",
                        "cover_medium" => "https://e-cdns-images.dzcdn.net/images/cover/37fd72a84a1290d873eba449556096d7/250x250-000000-80-0-0.jpg",
                        "cover_big" => "https://e-cdns-images.dzcdn.net/images/cover/37fd72a84a1290d873eba449556096d7/500x500-000000-80-0-0.jpg",
                        "cover_xl" => "https://e-cdns-images.dzcdn.net/images/cover/37fd72a84a1290d873eba449556096d7/1000x1000-000000-80-0-0.jpg",
                        "md5_image" => "37fd72a84a1290d873eba449556096d7",
                        "tracklist" => "https://api.deezer.com/album/13366351/tracks",
                        "type" => "album"
                    ],
                    "type" => "track"
                ],
                [
                    "id" => 940854842,
                    "readable" => true,
                    "title" => "Reiki",
                    "title_short" => "Reiki",
                    "title_version" => "",
                    "link" => "https://www.deezer.com/track/940854842",
                    "duration" => 106,
                    "rank" => 274568,
                    "explicit_lyrics" => false,
                    "explicit_content_lyrics" => 0,
                    "explicit_content_cover" => 2,
                    "preview" => "https://cdns-preview-0.dzcdn.net/stream/c-0868837812bbc73413100e10997cd6da-3.mp3",
                    "md5_image" => "abd3dac24aa6e0bf48d6ce91c2887437",
                    "artist" => [
                        "id" => 4477750,
                        "name" => "Einschlafmusik",
                        "link" => "https://www.deezer.com/artist/4477750",
                        "picture" => "https://api.deezer.com/artist/4477750/image",
                        "picture_small" => "https://e-cdns-images.dzcdn.net/images/artist/abd3dac24aa6e0bf48d6ce91c2887437/56x56-000000-80-0-0.jpg",
                        "picture_medium" => "https://e-cdns-images.dzcdn.net/images/artist/abd3dac24aa6e0bf48d6ce91c2887437/250x250-000000-80-0-0.jpg",
                        "picture_big" => "https://e-cdns-images.dzcdn.net/images/artist/abd3dac24aa6e0bf48d6ce91c2887437/500x500-000000-80-0-0.jpg",
                        "picture_xl" => "https://e-cdns-images.dzcdn.net/images/artist/abd3dac24aa6e0bf48d6ce91c2887437/1000x1000-000000-80-0-0.jpg",
                        "tracklist" => "https://api.deezer.com/artist/4477750/top?limit=50",
                        "type" => "artist"
                    ],
                    "album" => [
                        "id" => 144228272,
                        "title" => "Einschlafmusik - Musik zum Einschlafen",
                        "cover" => "https://api.deezer.com/album/144228272/image",
                        "cover_small" => "https://e-cdns-images.dzcdn.net/images/cover/abd3dac24aa6e0bf48d6ce91c2887437/56x56-000000-80-0-0.jpg",
                        "cover_medium" => "https://e-cdns-images.dzcdn.net/images/cover/abd3dac24aa6e0bf48d6ce91c2887437/250x250-000000-80-0-0.jpg",
                        "cover_big" => "https://e-cdns-images.dzcdn.net/images/cover/abd3dac24aa6e0bf48d6ce91c2887437/500x500-000000-80-0-0.jpg",
                        "cover_xl" => "https://e-cdns-images.dzcdn.net/images/cover/abd3dac24aa6e0bf48d6ce91c2887437/1000x1000-000000-80-0-0.jpg",
                        "md5_image" => "abd3dac24aa6e0bf48d6ce91c2887437",
                        "tracklist" => "https://api.deezer.com/album/144228272/tracks",
                        "type" => "album"
                    ],
                    "type" => "track"
                ]
            ],
            "total" => 324,
            "next" => "https://api.deezer.com/search?q=reik&index=25"
        ];

        $mockedService = Mockery::mock(DeezerServices::class);
        $mockedService->shouldReceive('search')->with('reik')->andReturn($fakeSearchtData);
        $this->app->instance(DeezerServices::class, $mockedService);
        $tracks = resolve(DeezerServices::class)->search('reik');
        $this->assertEquals($fakeSearchtData, $tracks);

        foreach ($tracks["data"] as $key => $track) {
            $this->saveArtist($track["artist"]);
            $this->saveAlbum($track["album"], $track["artist"]["id"]);
            $this->saveTracks($track, $track["album"]["id"], $track["artist"]["id"]);
        }
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
