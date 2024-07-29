<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisSovetDocument extends BaseModel
{
    protected $fillable = [
        'kk_title',
        'ru_title',
        'en_title',
        'kk_content',
        'ru_content',
        'en_content',
        'files',
    ];

    protected $casts = [
        'files' => 'collection'
    ];
}
