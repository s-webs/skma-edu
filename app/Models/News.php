<?php

namespace App\Models;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;

class News extends BaseModel
{
    use Sluggable;

    protected $fillable = ['kk_title', 'ru_title', 'en_title', 'kk_content', 'ru_content', 'en_content', 'kk_slug', 'ru_slug', 'en_slug', 'image', 'published', 'created_at', 'updated_at'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'ru_slug' => [
                'source' => 'ru_title'
            ],
            'kk_slug' => [
                'source' => 'kk_title'
            ],
            'en_slug' => [
                'source' => 'en_title'
            ]
        ];
    }

    public function getDate()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('d/m/Y');
    }

    public function getDottedDate()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('d.m.Y');
    }

    public function getTime()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('H:i');
    }

    public function getImageAttribute($value)
    {
        if (!$value) {
            return '/img/no-image.png';
        }

        return $value;
    }

    public function scopePublished($query)
    {
        return $query->where('published', 1);
    }

    public function scopeSearchTitle($query, $word)
    {
        return $query->where('ru_title', 'LIKE', "%$word%")->orWhere('kk_title', 'LIKE', "%$word%")->orWhere('en_title', 'LIKE', "%$word%")->orderBy('created_at');
    }

    public function scopeSearchContent($query, $word)
    {
        return $query->where('ru_content', 'LIKE', "%$word%")->orWhere('kk_content', 'LIKE', "%$word%")->orWhere('en_content', 'LIKE', "%$word%")->orderBy('created_at');
    }
}
