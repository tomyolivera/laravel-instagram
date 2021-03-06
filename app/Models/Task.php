<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = "tasks";

    // Many to One --- Users
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    // // Many to One --- Images
    // public function category_task()
    // {
    //     return $this->belongsTo('App\Models\Image', 'photo_id');
    // }
}
