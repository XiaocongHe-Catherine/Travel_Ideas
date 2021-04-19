<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{


    protected $table='comments_ideas';

    protected $fillable = [

        'id',
        'user_id',
        'idea_id',
        'comment',
];
    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
    public function idea(){
        return $this->belongsTo('App\Idea','idea_id');
    }


   
}