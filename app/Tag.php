<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{    public function idea(){
         return $this->beongsTo('App\Idea');
}
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tag_id', 
        'travel_id', 
        'tag_name',
    ];
}
