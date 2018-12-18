<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Art extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'arts';    

    protected $fillable = [
        'agency',
        'agency_name',
        'date',
        'description',
        'image_link',
        'material',
        'title',
        'artist_first_name',
        'artist_last_name',
        'line',
        'station_name',
    ];
}
