<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    public function tags(){
        return $this->hasMany('App\Tag');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }

      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 
        'user_id', 
        'title',
        'destination',
        'start_date',
        'end_date'
    ];
}
