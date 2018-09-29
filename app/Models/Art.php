<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Art extends Model
{
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
