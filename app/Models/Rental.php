<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'camera_id',
        'nama_lengkap',
        'nomor_telp',
        'email',
        'rent_date_start',
        'rent_date_end',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'rent_date_start' => 'date',
        'rent_date_end' => 'date',
    ];

    public function camera()
    {
        return $this->belongsTo(Camera::class);
    }
}