<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;
use Illuminate\Support\Str;

class CommentSeeder extends Seeder
{
    public function run(): void
    {
        $comments = [
            "Pelayanan cepet banget, kameranya juga bersih semua. Recommended!",
            "Harga murah tapi kualitas alatnya bagus. Bakal rental lagi di sini.",
            "Adminnya ramah dan fast respon. Pengambilan dan pengembalian gampang.",
            "Lokasi mudah dijangkau dan peralatan lengkap!",
            "Kualitas kameranya mantap, cocok buat photoshoot outdoor.",
            "Sangat puas, kamera berfungsi 100% tanpa kendala.",
            "Pengalaman rental terbaik! Proses mudah dan alat terawat.",
            "Keren banget, lengkap dan profesional pelayanannya.",
            "Puas banget! Gearnya lengkap semua, mantap pokoknya.",
            "Sangat membantu untuk job mendadak. Siap dalam 5 menit!"
        ];

        foreach ($comments as $text) {
            Comment::create([
                'comment' => $text,
            ]);
        }

        Comment::factory()
            ->count(10)
            ->create(); 
    }
}
