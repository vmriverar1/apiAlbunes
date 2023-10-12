<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class TrackCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection->map(function ($track) {
                return new TrackResource($track);
            })->all(),
        ];
    }

    public function toResponse($request)
    {
        return array_merge($this->toArray($request), $this->with($request));
    }

    public function with($request)
    {
        return [
            'total' => $this->resource->total(),
            'next' => $this->resource->nextPageUrl(),
        ];
    }
}
