<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisSovetAnnouncement extends BaseModel
{
    protected $fillable = [
        'education_program_id',
        'kk_title',
        'ru_title',
        'en_title',
        'kk_content',
        'ru_content',
        'en_content',
    ];
    protected $casts = [
        'files' => 'collection'
    ];
    public function educationProgram    ()
    {
        return $this->belongsTo(EducationProgram::class);
    }
}
