<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'uri',
        'meta_desc',
        'keywords',
        'thumbnail_image',
        'header_image',
        'published_at',
        'is_public',
        'body',
        'is_markdown'
    ];

    protected $dates = [
        'published_at'
    ];

    /**
     * 
     *           Query Scopes
     * 
     */
    public function scopePublished($query)
    {
        $query->where('published_at', '<=', Carbon::now());
    }

    public function scopeIsPublic($query)
    {
        $query->where('is_public', true);
    }


    /**
     * 
     *           Mutators
     * 
     */
    public function getRouteKeyName()
    {
        return 'uri';
    }

    public function setUriAttribute($uri)
    {
        $this->attributes['uri'] = strtolower(str_replace(' ', '-', $uri));
    }

    public function getUriAttribute($uri)
    {
        return strtolower(str_replace(' ', '-', $uri));
    }

    public function setPublishedAtAttribute($date)
    {
        $this->attributes['published_at'] = Carbon::parse($date);
    }

    public function getPublishedAtAttribute($date)
    {
        return Carbon::parse($date);
    }

    public function getTagListAttribute()
    {
        return $this->tags()->pluck('id')->toArray();
    }

    public function getTagListNamesAttribute()
    {
        return $this->tags()->pluck('name')->toArray();
    }

    /**
     * 
     *           Relationships
     * 
     */
    public function images()
    {
        return $this->belongsToMany('App\Multimed')->withTimestamps();
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }
}
