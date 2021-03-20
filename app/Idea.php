<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
  

      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'travel_id', 
        'user_id', 
        'title',
        'destination',
        'start_date',
        'end_date'
    ];
}
