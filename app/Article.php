<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';
    protected $guarded = [];

    public function category(){
        return $this->belongsToMany('App\Category','category_article');
    }

    public function scopeApproved($query)
    {
        return $query->where('active', true);
    }

    public function comments() {
        return $this->hasMany('App\Comment');
    }
}
