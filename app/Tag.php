<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['tag','tag_url'];

    /* AB - use this method we get all tag for one post*/
    public function posts()
    {
      return $this->belongsToMany('App\Post');
    }
}
