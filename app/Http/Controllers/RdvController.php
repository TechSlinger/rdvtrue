<?php

namespace App\Http\Controllers;

use App\Models\Rdv;
use GrahamCampbell\ResultType\Success;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use App\Models\Medecin;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class RdvController extends Controller
{
    // ...

    // Display the form to book an appointment
    public function create(Medecin $medecin)
    {   if(!Auth::check()){
        return redirect()->route('login')->with('message','log in before taking your appointment!');
    }
        
        return view('rdv.create', compact('medecin'));
    }

    public function store(Request $request, Medecin $medecin)
{
    // Validate the $medecin parameter
    if (!$medecin) {
        return redirect()->back()->with('error', 'Invalid doctor.');
    }
    
    // Create the appointment in the database
    $rdv = Rdv::create([
        'medecin_id' => $request->input('medecin'),
        'user_id' => $request->input('user_id'),   
        'phonenumber'=>$request->input('phonenumber'),
        'appointment_date' => $request->input('appointment_date'),
        'appointment_time' => $request->input('appointment_time'),
    ]);
     // This will show all the submitted form data

 

// Store $rdv in the session
session(['stored_rdv' => $rdv]);

    return redirect()->route('view_rdv_info')->with('success', 'Appointment booked successfully!');
}

    

    public function view_rdv_info(Request $request)
    {
        $rdv = session('stored_rdv');
        
        if (!$rdv) {
            return redirect()->back()->with('error', 'No appointment data found.');
        }
        return view('view_rdv_info', compact('rdv'));
       
        }

    public function dashboard()
        { 
            $medecin = Auth::guard('medecin')->user();
            $rdvs = Rdv::where('medecin_id', $medecin->id)->get();

                return view('medecins.dashboard', compact('rdvs'));
       
            
        }

    public function destroy(Rdv $rdv){
        $rdv->delete();
        return redirect()->back();
    }
        

    
    }
    
    
   
   
   
    
    

   
    
 


