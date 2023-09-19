<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Medecin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DoctorAuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:medecin')->except('logout');
    }

    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect()->route('home'); // Redirect authenticated users away from login page
        }

        return view('auth.doctor-login');
    }

    public function showRegistrationForm()
    {
        if (Auth::guard('medecin')->check()) {
            return redirect()->route('doctor.dashboard'); // Redirect authenticated medecins from registration
        }

        return view('auth.doctor-register');
    }

    public function login(Request $request)
    {
        // Validate the login data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to authenticate the medecin
        if (Auth::guard('medecin')->attempt($request->only('email', 'password'), $request->filled('remember'))) {
            return redirect()->route('doctor.dashboard'); // Redirect successful login
        }

        // Authentication failed
        return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors([
            'email' => 'These credentials do not match our records.',
        ]);
    }

    public function register(Request $request)
{
    // Validate the registration data
    $this->validate($request, [
        'name' => 'required',
        'email' => 'required|email|unique:medecins',
        'password' => 'required|confirmed',
        'city' => 'required',
        'phonenumber' => 'required',
        'speciality' => 'required',
    ]);

    $input = $request->all();
    $input['password'] = Hash::make($request->input('password'));

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('/public/images', $imageName); // Adjust storage path
        $input['image'] = $imageName;
    }

    // Attempt to create the Medecin model

    $medecin = Medecin::create($input);

    if ($medecin) {
        // Log in the user
        Auth::guard('medecin')->login($medecin);
        return redirect()->route('doctor.dashboard')->with('success', 'You were added successfully.');
    } else {
        // Handle the case when the model creation fails
        return redirect()->back()->with('error', 'Registration failed. Please try again.');
    }

}



   

    public function logout()
    {
        Auth::guard('medecin')->logout();
        return redirect()->route('home'); // Redirect to home after logout
    }

    // You can add more methods here for medecin-specific functionality
}
