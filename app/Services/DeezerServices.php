<?php

namespace App\Services;

use App\Traits\ConsumeExternalServices;

class DeezerServices
{
    use ConsumeExternalServices;

    protected $baseUri;

    public function __construct()
    {
        $this->baseUri = config('services.deezer.base_uri');
    }

    public function find_album($album){
        return $this->makeRequest(
            'GET',
            '/album/'.$album,
            [],
            [],
            [],
            $isJsonRequest = true,
        );
    }

    public function find_artist($artist){
        return $this->makeRequest(
            'GET',
            '/artist/'.$artist,
            [],
            [],
            [],
            $isJsonRequest = true,
        );
    }

    public function search($data, $index){
        return $this->makeRequest(
            'GET',
            '/search',
            [
                'q' => $data,
                'index' => $index*25
            ],
            [],
            [],
            $isJsonRequest = true,
        );
    }
}