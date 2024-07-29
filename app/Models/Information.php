<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Information extends BaseModel
{
    protected $fillable = ['ru_title', 'kk_title', 'en_title', 'ru_gallery_intro', 'kk_gallery_intro', 'en_gallery_intro'];
}
