<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = 'categories';

    public $timestamps = false;

    protected $fillable = [
        'name', 'description'
    ];


    public function posts(){

        return $this->hasMany('App\Post');

    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commenttable');
    }
}
