<?php

namespace App\Models;

use Carbon\Carbon; // Jangan lupa import ini
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;

    protected $fillable = [
        'camera_id',
        'nama_lengkap',
        'nomor_telp',
        'email',
        'rent_date_start',
        'rent_date_end',
        'total_days',  // Pastikan ini ada
        'total_price', // Pastikan ini ada
        'status',
    ];

    protected $casts = [
        'rent_date_start' => 'date',
        'rent_date_end' => 'date',
    ];

    public function camera()
    {
        return $this->belongsTo(Camera::class);
    }

    /**
     * The "booted" method of the model.
     * Otomatis hitung harga dan hari setiap kali data dibuat atau diupdate.
     */
    protected static function booted()
    {
        static::saving(function ($rental) {
            if ($rental->rent_date_start && $rental->rent_date_end) {
                $start = Carbon::parse($rental->rent_date_start);
                $end = Carbon::parse($rental->rent_date_end);

                // Hitung selisih hari (inklusif/ditambah 1 hari karena sewa dihitung per hari kalender)
                $days = $start->diffInDays($end) + 1;
                
                // Simpan total hari
                $rental->total_days = max($days, 1); // Minimal 1 hari
            }

            // Ambil harga kamera dari relasi untuk menghitung total
            // Kita load relasi camera jika belum ada
            if (!$rental->relationLoaded('camera')) {
                $rental->load('camera');
            }

            if ($rental->camera && $rental->total_days) {
                // Total Harga = Hari * Harga Kamera Per Hari
                $rental->total_price = $rental->total_days * $rental->camera->price_per_day;
            }
        });
    }
}