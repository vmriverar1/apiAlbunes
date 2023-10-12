<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AlbumContributorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this["artist"]["id"],
            "name" => $this["artist"]["name"],
            "link" => $this["artist"]["link"],
            "share" => $this["artist"]["share"],
            "picture" => $this["artist"]["picture"],
            "picture_small" => $this["artist"]["picture_small"],
            "picture_medium" => $this["artist"]["picture_medium"],
            "picture_big" => $this["artist"]["picture_big"],
            "picture_xl" => $this["artist"]["picture_xl"],
            "radio" => $this["artist"]["radio"],
            "tracklist" => $this["artist"]["tracklist"],
            "type" => "artist",
            "role" => $this["contributor"]["role"]
        ];
    }
}
