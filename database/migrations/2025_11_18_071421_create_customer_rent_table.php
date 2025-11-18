<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Saya ganti nama tabelnya menjadi 'rentals' agar sesuai standar Laravel
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();

            // Kunci asing untuk tahu kamera mana yang disewa
            $table->foreignId('camera_id')->constrained('cameras')->onDelete('cascade');
            
            // Info penyewa
            $table->string('nama_lengkap');
            $table->string('nomor_telp'); 
            $table->string('email');
            $table->date('rent_date_start');
            $table->date('rent_date_end');
            $table->string('status')->default('pending');   
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }
};