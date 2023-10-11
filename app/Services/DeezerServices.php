<?php

namespace App\Services;

use App\Traits\ConsumeExternalServices;

class DeezerServices
{
    use ConsumeExternalServices;

    protected $baseUri;
    protected $clientId;
    protected $clientSecret;

    public function __construct()
    {
        $this->baseUri = config('services.deezer.base_uri');
        // $this->clientId = config('services.racing_uk.client_id');
        // $this->clientSecret = config('services.racing_uk.client_secret');
    }

    public function resolveAuthorization(&$queryParams,&$formParams,&$headers)
    {
        // $headers['Authorization'] = $this->resolveAccessToken();
        // $headers['X-RapidAPI-Key'] = "465c553472msh2d57593e0277af8p12ebb1jsn57b1a88d260f";
        // $headers['X-RapidAPI-Host'] = "greyhound-racing-uk.p.rapidapi.com";
    }

    public function decodeRespose($response){
        return json_decode($response);
    }

    public function resolveAccessToken(){
        $credentials = base64_encode("{$this->clientId}:{$this->clientSecret}");
        return "Basic {$credentials}";
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

    public function search($data){
        return $this->makeRequest(
            'GET',
            '/search?q='.$data,
            [],
            [],
            [],
            $isJsonRequest = true,
        );
    }
}