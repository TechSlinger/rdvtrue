<?php

namespace App\Http\Controllers;

use App\Models\Rdv;
use GrahamCampbell\ResultType\Success;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use App\Models\Medecin;
use App\Models\User;

class RdvController extends Controller
{
    // ...

    // Display the form to book an appointment
    public function create(Medecin $medecin)
    {
        return view('rdv.create', compact('medecin'));
    }

    public function store(Request $request, Medecin $medecin)
{
    // Validate the $medecin parameter
    if (!$medecin) {
        return redirect()->back()->with('error', 'Invalid doctor.');
    }
    
    // ... (previous code)
    $user = User::firstOrCreate([
        'name' => $request->input('user_name'),
    ]);
    
    // Create the appointment in the database
    $rdv = Rdv::create([
        'medecin_id' => $request->input('medecin'),
        'user_id' => $user->id,
        'appointment_date' => $request->input('appointment_date'),
        'appointment_time' => $request->input('appointment_time'),
        'confirmed'=> false,
    ]);

// Store $rdv in the session
session(['stored_rdv' => $rdv]);
    // Redirect back to the doctor's profile or show a success message
    return redirect()->route('confirm')->with('success', 'Appointment booked successfully!');
}

    
    // ... (other methods)

    // Handle appointment confirmation by the user
    public function confirm()
    {
        $rdv = session('stored_rdv');
    
        if (!$rdv) {
            return redirect()->back()->with('error', 'No appointment data found.');
        }
    
        $rdv->update(['confirmed' => true]);
    
        return view('viewconfirm',compact('rdv'));
    }
    
    
   
   
   
    
    

   
    
 
}

