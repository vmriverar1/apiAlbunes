<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AlbumArtistResource extends JsonResource
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
            'name' => $this->name,
            'picture' => $this->picture,
            'picture_small' => $this->picture_small,
            'picture_medium' => $this->picture_medium,
            'picture_big' => $this->picture_big,
            'picture_xl' => $this->picture_xl,
            'tracklist' => $this->tracklist,
            'type' => 'artist',
        ];
    }
}
