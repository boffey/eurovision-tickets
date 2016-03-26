<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Support\Eurovision\Story as EuroStory;

class Story extends Model
{
    protected $fillable = [
        'title',
        'url',
        'published',
    ];

    public function getDates()
    {
        return ['created_at', 'updated_at', 'published'];
    }
}
