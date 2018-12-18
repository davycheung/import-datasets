<?php

namespace App\Console\Commands\MTA;

use Goutte;
use App\Models\Art as ArtModel;
use App\Services\MTA\Art as Client;
// use GuzzleHttp\Client;
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

    protected $client;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Client $client)
    {
        $this->client = $client;

        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $results = $this->client->get();

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

        //     // dump($art->art_image_link);
        //     // $crawler = Goutte::request('GET', $art->art_image_link);
        //     // $crawler->filter('img[src^="../images"]')->each(function ($node) {
        //     //   dump($node->attr('src'));
        //     // });
        }
    }
}
