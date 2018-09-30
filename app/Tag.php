<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded = [];

    public function posts()
    {
        // A tag belongs to many Posts
        return $this->belongsToMany(Post::class);    
    }


    public function getRouteKeyName()
    {
        return 'name';
    }
}
