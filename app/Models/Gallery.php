<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gallery extends BaseModel
{
    protected $fillable = ['image', 'created_at', 'updated_at'];
}
