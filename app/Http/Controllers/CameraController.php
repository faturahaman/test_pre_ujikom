<?php

namespace App\Http\Controllers;

use App\Models\Camera;

class PublicCameraController extends Controller
{
    public function index()
    {
        $cameras = Camera::where('is_available', true)->latest()->paginate(12);
        return view('home', compact('cameras')); 
    }

    public function show(Camera $camera)
    {
        return view('camera-detail', compact('camera')); 
    }
}