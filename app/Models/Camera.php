<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // <--- TAMBAHIN INI

class Camera extends Model
{
    use HasFactory;

    // Pastiin fillable-nya ada (penting!)
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'image_url',
        'specifications',
        'price_per_day',
        'specifications',
        'is_available',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}