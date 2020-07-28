<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anime extends Model
{
    protected $fillable = [
        'title', 'title_english', 'title_japanese', 'episodes', 'score', 'scored_by', 'synopsis', 'url', 'image_url', 
    ];
}
