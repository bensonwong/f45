<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Member extends Model
{
    use HasSlug;

    protected $fillable = [
        'name',
        'studio_slug',
        'img'
    ];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function cards()
    {
        return $this->hasMany(Card::class, 'member_slug', 'slug');
    }

    public function studio()
    {
        return $this->hasOne(Studio::class, 'slug', 'studio_slug');
    }

    public function getLatestCardAttribute()
    {
        return $this->cards->last();
    }

    public function sessions()
    {
        return $this->hasMany(Member::class);
    }
}
