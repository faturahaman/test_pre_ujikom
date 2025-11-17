<?php

namespace App\Models;

use App\Enums\ArticleStatus; // Impor Enum
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    /**
     * Kolom yang boleh diisi saat membuat atau mengubah data (mass assignment).
     *
     * @var array<int, string>
     */
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
}