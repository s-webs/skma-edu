<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisSovetInformation extends BaseModel
{
    protected $fillable = [
        'id',
        'kk_title',
        'ru_title',
        'en_title',
        'kk_file',
        'ru_file',
        'en_file',
    ];
}
