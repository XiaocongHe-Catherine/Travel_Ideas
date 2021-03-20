<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [

            'comment_id',
            'user_id',
            'travel_id',
            'comment',
    ];
}