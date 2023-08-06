<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{

   

   
    public function index()
    {
        // Array of image file names
        $images = [
            'image1.avif',
            'image2.avif',
            'image3.avif',
            'image4.avif',
            'image5.avif',
        ];

        $medecin='medecin.png';

        // Shuffle the array to get random images
        shuffle($images);

        return view('home', compact('images'));
    }
        
}
