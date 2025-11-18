<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class RentController extends Controller
{
    /**
     * Simpan data pemesanan baru.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // 1. Validasi data
        $validatedData = $request->validate([
            'camera_id'       => 'required|exists:cameras,id',
            'nama_lengkap'    => 'required|string|max:255',
            'nomor_telp'      => 'required|string|max:20',
            'email'           => 'required|email|max:255',
            'rent_date_start' => 'required|date|after_or_equal:today',
            'rent_date_end'   => 'required|date|after:rent_date_start',
        ]);

        // 2. Buat data rental baru
        Rental::create([
            'camera_id'       => $validatedData['camera_id'],
            'nama_lengkap'    => $validatedData['nama_lengkap'],
            'nomor_telp'      => $validatedData['nomor_telp'],
            'email'           => $validatedData['email'],
            'rent_date_start' => $validatedData['rent_date_start'],
            'rent_date_end'   => $validatedData['rent_date_end'],
            'status'          => 'pending', // Status default
        ]);

        // 3. Redirect kembali dengan pesan sukses
        // (Anda perlu menampilkan pesan ini di view Anda)
        return Redirect::back()->with('success', 'Rental request submitted successfully!');
    }
}