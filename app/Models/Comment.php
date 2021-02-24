<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "comments";

    // Many to One --- Users
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    // Many to One --- Images
    public function images()
    {
        return $this->belongsTo('App\Models\Image', 'photo_id');
    }
}
