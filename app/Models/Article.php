<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image_url',
        'excerpt',
        'content',
        'status',
        'is_featured',
        'published_at',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'published_at' => 'datetime',
    ];

    protected static function booted(): void
    {
        static::saving(function (Article $article) {
            // Cek apakah artikel ini sedang diset sebagai Featured
            if ($article->is_featured) {
                static::where('id', '!=', $article->id)
                    ->where('is_featured', true)
                    ->update(['is_featured' => false]);
            }
        });
    }
}