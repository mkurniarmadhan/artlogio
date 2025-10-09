<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{

    use HasFactory, SoftDeletes;
    protected $fillable = [
        'title',
        'content',
        'is_active',
        'published_at'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'published_at' => 'datetime'
    ];

    public function scopePublished($query)
    {
        return $query->where('is_active', true);
    }
}
