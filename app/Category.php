<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $guarded = [];

    public function articles() {
        return $this->belongsToMany('App\Article','category_article')->latest()->approved();
    }
}
