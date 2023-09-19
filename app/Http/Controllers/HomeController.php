<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Broadcast;
use App\Models\Feedback;



class HomeController extends Controller
{
   
    public function index()
    {
         return view('home');
    }
    public function submitFeedback(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'feedback' => 'required',
        ]);

        Feedback::create([
            'name' => $request->input('name'),
            'feedback' => $request->input('feedback'),
        ]);

        return redirect()->route('home')->with('success', 'Feedback submitted successfully!');
    }

    public function all_feedback(){
        $feedbacks=Feedback::all();
        return view('all_feedback',compact('feedbacks'));
    }

  
    
}