<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable=[
        'title',
        'description',
        'image',
        'link',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category','category_id','id');
    }

    public function comment(){
        return $this->morphMany('App\comment','commendable');
    }
}
