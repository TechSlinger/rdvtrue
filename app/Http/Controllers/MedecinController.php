<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\Medecin; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Rdv;


class MedecinController extends Controller   {
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $medecins = Medecin::latest()->paginate(5);
    return view('medecins.index', compact('medecins'))->with('i',(request()->input('page',1) -1)*5);

}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('medecins.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'city'=>'required',
            'phonenumber'=>'required',
            'speciality' =>'required',
        ]);

        $input = $request->all();
        $input['user_id'] = Auth::user()->id;
        $input['password'] = bcrypt($request->input('password'));

        if($request->hasFile('image')){
            $image=$request->file('image');
            $imageName=time() . "." . $image->getClientOriginalExtension() ;
            $image->storeAs('/storage/app/public/images',$imageName);
            $input['image']=$imageName;
        }
        
        Medecin::create($input);
        return redirect()->route('medecins.index')->with('success','The doctor was added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Medecin $medecin)
    {
        return view('medecins.show',compact('medecin'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medecin $medecin)
    {
        return view('medecins.edit',compact('medecin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Medecin $medecin)
    {
        $request->validate([
            'name'=>'required',
            'city'=>'required',
            'phonenumber'=>'required',
            'speciality' =>'required',
        ]);
        $input = $request->all();
        if($request->hasFile('image')){
            $image=$request->file('image');
            $imageName=time() . "." . $image->getClientOriginalExtension() ;
            $image->storeAs('/storage/app/public/images',$imageName);
            $input['image']=$imageName;
        }

        $medecin->update($input);
        return redirect()->route('medecins.index')->with('success','The docotr was updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medecin $medecin)
    {
        $medecin->delete();
        return redirect()->route('medecins.index')->with('success','The doctor was deleted successfully');
    }
    public function doctors()
    {
        $medecins=Medecin::latest()->paginate(5);
        return view('doctors', compact('medecins'));
    }

    public function search(Request $request)
    {
        $city = $request->input('city');
        $speciality = $request->input('speciality');
    
        // Use the city and/or speciality to filter the medecins
        $medecins = Medecin::where(function ($query) use ($city, $speciality) {
            if (!empty($city)) {
                $query->where('city', $city);
            }
            if (!empty($speciality)) {
                $query->orWhere('speciality', $speciality);
            }
        })->get();
    
        if (!$medecins->isEmpty()) {
            return view('home', compact('medecins'));
        } else {
            return redirect()->route('doctors')->with('message', 'No doctors found for the selected criteria.');
        }
    }
    

    public function confirm_add(Request $request) {
        if ($request->has('confirm')) {
            // User confirmed, proceed to add the doctor
            // Add your logic to add the doctor here
    
            // Redirect to the 'adddoctor' route after confirming
            return redirect()->route('adddoctor');
        }
    
        // Show the confirmation page
        return view('confirmadd');
    }
    

    Public function addoctor(){
        return view('medecins.create');
    }

    

   



   
    
  
    
    }





