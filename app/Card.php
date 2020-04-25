<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Card extends Model
{
    protected $fillable = [
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

    public function getNumClassesAttribute()
    {
        return count($this->classesArray);
    }

    public function getClassesArrayAttribute()
    {
        return explode(',', $this->classes);
    }
}
