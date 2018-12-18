<?php

namespace App\Services\MTA;

use GuzzleHttp\Client;

class Art
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://data.ny.gov',
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);
    }

    public function get()
    {
        $response = $this->client->get('https://data.ny.gov/resource/qius-v36q.json');
        
        return json_decode($response->getBody());
    }
}