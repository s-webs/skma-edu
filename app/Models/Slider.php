<?php

namespace App\Models;

class Slider extends BaseModel
{
    protected $fillable = ['kk_title', 'ru_title', 'en_title', 'kk_description', 'ru_description', 'en_description', 'kk_link', 'ru_link', 'en_link', 'kk_image', 'ru_image', 'en_image', 'published', 'created_at', 'updated_at'];

    public function scopePublished($query)
    {
        return $query->where('published', 1);
    }
}
