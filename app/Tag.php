<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Pagination\Paginator;

class Tag extends Model
{
    protected $fillable = [
        'name'
    ];
    public function getRouteKeyName()
    {
        return 'name';
    }
    public function articles()
    {
        return $this->belongsToMany('App\Article')->published()->isPublic();
    }
}
