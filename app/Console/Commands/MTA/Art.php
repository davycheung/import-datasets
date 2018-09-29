<?php

namespace App\Console\Commands\MTA;

use App\Models\Art as ArtModel;
use GuzzleHttp\Client;
use Illuminate\Console\Command;

class Art extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mta:art';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import MTA Art.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://data.ny.gov',
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);
        $response = $client->get('https://data.ny.gov/resource/qius-v36q.json');
        $results = json_decode($response->getBody());

        foreach ($results as $art) {
            ArtModel::updateOrCreate([
                'agency' => $art->agency,
                'agency_name' => $art->agency_name,
                'date' => $art->art_date,
                'description' => $art->art_description,
                'image_link' => $art->art_image_link,
                'material' => $art->art_material,
                'title' => $art->art_title,
                'artist_first_name' => $art->artist_first_name ?? '',
                'artist_last_name' => $art->artist_last_name ?? '',
                'line' => $art->line,
                'station_name' => $art->station_name,
            ]);
        }
    }
}
