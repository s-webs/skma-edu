<?php

namespace App\Models;

class Honor extends BaseModel
{
    protected $fillable = ['kk_title', 'ru_title', 'en_title', 'kk_image', 'ru_image', 'en_image', 'published', 'order', 'created_at', 'updated_at'];

    public function getOrderField()
    {
        return 'order';
    }

    public function scopePublished($query)
    {
        return $query->where('published', 1);
    }
}
