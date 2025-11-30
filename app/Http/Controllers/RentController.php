<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class RentController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validasi
        $validatedData = $request->validate([
            'camera_id'       => 'required|exists:cameras,id',
            'nama_lengkap'    => 'required|string|max:255',
            'nomor_telp'      => 'required|string|max:20',
            'email'           => 'required|email|max:255',
            'rent_date_start' => 'required|date|after_or_equal:today',
            'rent_date_end'   => 'required|date|after_or_equal:rent_date_start', // Ganti after menjadi after_or_equal agar bisa sewa 1 hari
        ]);

        // 2. Create Data
        // total_days dan total_price akan dihitung otomatis oleh Model (booted method)
        Rental::create([
            'camera_id'       => $validatedData['camera_id'],
            'nama_lengkap'    => $validatedData['nama_lengkap'],
            'nomor_telp'      => $validatedData['nomor_telp'],
            'email'           => $validatedData['email'],
            'rent_date_start' => $validatedData['rent_date_start'],
            'rent_date_end'   => $validatedData['rent_date_end'],
            'status'          => 'pending',
        ]);

        // 3. Redirect dengan Session Success (agar SweetAlert muncul)
        return Redirect::back()->with('success', 'Rental request submitted successfully! Our team will contact and Confirm the request');
    }
}