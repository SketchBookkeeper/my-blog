<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use Sluggable;

    protected $guarded = [];

    // Set defaults for some values
    protected $attributes = [
        'excerpt' => '',
        'body' => 'Hello World'
    ];

    // @link https://github.com/cviebrock/eloquent-sluggable
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
