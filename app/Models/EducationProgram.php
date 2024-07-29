<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationProgram extends BaseModel
{
    protected $fillable = [
        'kk_title',
        'ru_title',
        'en_title',
    ];

    public function announcements(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(DisSovetAnnouncement::class, 'education_program_id', 'id');
    }
}
