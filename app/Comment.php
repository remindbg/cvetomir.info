<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Comment extends Model
{
    protected $guarded = [];

    public function post() {
        return $this->belongsTo('App\Article');
    }

    public function scopeApproved($query)
    {
        return $query->where('active', true);
    }

    public function articles() {
        return $this->belongsTo('App\Article');
    }

}
