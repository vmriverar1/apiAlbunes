<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\AlbumGenreResource;
use App\Http\Resources\AlbumTrackResource;
use App\Http\Resources\AlbumArtistResource;
use Illuminate\Http\Resources\Json\JsonResource;

class AlbumResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'upc' => $this->upc,
            'link' => $this->link,
            'share' => $this->share,
            'cover' => $this->cover,
            'cover_small' => $this->cover_small,
            'cover_medium' => $this->cover_medium,
            'cover_big' => $this->cover_big,
            'cover_xl' => $this->cover_xl,
            'md5_image' => $this->md5_image,
            'genre_id' => $this->genre_id,
            'genres' => new AlbumGenreResource($this->whenLoaded('genre')),
            'label' => $this->label,
            'nb_tracks' => $this->nb_tracks,
            'duration' => $this->duration,
            'fans' => $this->fans,
            'release_date' => $this->release_date,
            'record_type' => $this->record_type,
            'available' => $this->available,
            'tracklist' => $this->tracklist,
            'explicit_lyrics' => $this->explicit_lyrics,
            'explicit_content_lyrics' => $this->explicit_content_lyrics,
            'explicit_content_cover' => $this->explicit_content_cover,
            'contributors' => new AlbumContributorResource(collect(['contributor' => $this->whenLoaded('contributor'), 'artist' => $this->whenLoaded('artist')])),
            'artist' => new AlbumArtistResource($this->whenLoaded('artist')),
            'type' => 'album',
            'tracks' =>  ["data"=> AlbumTrackResource::collection($this->whenLoaded('tracks'))]
        ];
    }
}
