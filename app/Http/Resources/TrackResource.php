<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TrackResource extends JsonResource
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
            'readable' => $this->readable,
            'title' => $this->title,
            'title_short' => $this->title_short,
            'title_version' => $this->title_version,
            'link' => $this->link,
            'duration' => $this->duration,
            'rank' => $this->rank,
            'explicit_lyrics' => $this->explicit_lyrics,
            'explicit_content_lyrics' => $this->explicit_content_lyrics,
            'explicit_content_cover' => $this->explicit_content_cover,
            'preview' => $this->preview,
            'md5_image' => $this->md5_image,
            'artist' => [
                'id' => $this->artist->id,
                'name' => $this->artist->name,
                'link' => $this->artist->link,
                'picture' => $this->artist->picture,
                'picture_small' => $this->artist->picture_small,
                'picture_medium' => $this->artist->picture_medium,
                'picture_big' => $this->artist->picture_big,
                'picture_xl' => $this->artist->picture_xl,
                'tracklist' => $this->artist->tracklist,
                'type' => "artist"
            ],
            'album' => [
                'id' => $this->album->id,
                'title' => $this->album->title,
                'cover' => $this->album->cover,
                'cover_small' => $this->album->cover_small,
                'cover_medium' => $this->album->cover_medium,
                'cover_big' => $this->album->cover_big,
                'cover_xl' => $this->album->cover_xl,
                'md5_image' => $this->album->md5_image,
                'tracklist' => $this->album->tracklist,
                'type' => "album"
            ],
            'type' => "track"
        ];
    }
}
