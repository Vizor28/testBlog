<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $table = 'posts';

    public $timestamps = false;

    protected $fillable = [
        'name' , 'content', 'file', 'category_id'
    ];

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commenttable');
    }
}
