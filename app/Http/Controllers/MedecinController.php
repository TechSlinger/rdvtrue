<?php

namespace App\Http\Controllers;

use App\Models\Medecin;
use App\Models\Rdv;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;


class MedecinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $medecins = Medecin::latest()->paginate(6);
    return view('medecins.index', compact('medecins'));
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
        if($request->hasFile('image')){
            $image=$request->file('image');
            $imageName=time() . "." . $image->getClientOriginalExtension() ;
            $image->storeAs('/storage/app/public/images',$imageName);
            $input['image']=$imageName;
        }
        
        Medecin::create($input);
        return redirect()->route('medecins.index')->with('success','The medecin was added successfully');
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
        return redirect()->route('medecins.index')->with('success','The medecin was updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medecin $medecin)
    {
        $medecin->delete();
        return redirect()->route('medecins.index')->with('success','The medecin was deleted successfully');
    }
    public function allmedecin()
    {
        $medecins=Medecin::latest()->paginate(5);
        return view('allmedecins', compact('medecins'));
    }

    public function search(Request $request)
    {
        $city = $request->input('city');
        $speciality = $request->input('speciality');
    
        // Use the city and speciality to filter the medecins
        $medecins = Medecin::where('city', $city)
            ->where('speciality', $speciality)
            ->get();
    
        return view('home', compact('medecins'));
    }

    public function adddoctor(){
        return view('medecins.create');
    }
}



