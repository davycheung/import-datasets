<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Art extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'arts';    

    protected $fillable = [
        'date',
        'title',
        'description',
        'image_link',
        'material',
        'agency',
        'artist',
        'location',
    ];
}
