<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Question extends Model
{
    protected $fillable = ['name', 'email', 'text', 'answer', 'published'];

    public function getShortText()
    {
        return Str::limit($this->text, 50, '...');
    }

    public function getDottedDate()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('d.m.Y');
    }

    public function getTime()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('H:i');
    }

    public function scopePublished($query)
    {
        return $query->where('published', 1);
    }
}
