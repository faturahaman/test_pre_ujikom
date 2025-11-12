<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany; 

class Category extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'image_url'];

    public function cameras()
    {
        return $this->hasMany(Camera::class);
    }
    
}
