<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class PagesController extends Controller
{
    public function medecin(){
        return view('medecins.index');
    }
  
}
