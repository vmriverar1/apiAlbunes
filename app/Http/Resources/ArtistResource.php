<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArtistResource extends JsonResource
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
            'link' => $this->link,
            'share' => $this->share,
            'picture' => $this->picture,
            'picture_small' => $this->picture_small,
            'picture_medium' => $this->picture_medium,
            'picture_big' => $this->picture_big,
            'picture_xl' => $this->picture_xl,
            'nb_album' => $this->nb_album,
            'nb_fan' => $this->nb_fan,
            'radio' => $this->radio,
            'tracklist' => $this->tracklist,
            'type'=> "artist"
        ];
    }
}
