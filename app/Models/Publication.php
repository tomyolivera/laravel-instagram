<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    protected $table = 'publications';

    // One to Many --- Comments
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    // One to Many --- Likes
    public function likes()
    {
        return $this->hasMany('App\Models\Like');
    }

    // Many to One --- Users
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
