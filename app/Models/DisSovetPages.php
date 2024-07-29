<?php

namespace App\Models;

class DisSovetPages extends BaseModel
{
    protected $fillable = [
        'kk_title',
        'ru_title',
        'en_title',

        'kk_content',
        'ru_content',
        'en_content',

        'kk_files',
        'ru_files',
        'en_files',

        'kk_slug',
        'ru_slug',
        'en_slug',
    ];

    protected $casts = [
        'kk_files' => 'array',
        'ru_files' => 'array',
        'en_files' => 'array',
    ];
}
