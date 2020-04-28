<?php

namespace App;

use Illuminate\Support\Facades\Storage;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasSlug;

    protected $fillable = [
        'studio_slug',
        'member_slug',
        'studio_name',
        'member_name',
        'week_number',
        'classes',
        'img',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom(['studio_slug', 'member_slug', 'week_number'])
            ->saveSlugsTo('slug');
    }

    public function studio()
    {
        return $this->hasOne(Studio::class, 'slug', 'studio_slug');
    }

    public function member()
    {
        return $this->hasOne(Member::class, 'slug', 'member_slug');
    }

    public function getMemberNameAttribute()
    {
        if ($this->attributes['member_name'] !== null) {
            return $this->attributes['member_name'];
        }

        return $this->member->name;
    }

    public function getStudioNameAttribute()
    {
        if ($this->attributes['studio_name'] !== null) {
            return $this->attributes['studio_name'];
        }

        return $this->studio->name;
    }

    public function getImgAttribute()
    {
        if ($this->attributes['member_slug'] !== null) {
            return $this->member->img;
        }

        return '';
    }

    public function getNumClassesAttribute()
    {
        return count($this->classesArray);
    }

    public function getClassesArrayAttribute()
    {
        return explode(',', $this->classes);
    }
}
