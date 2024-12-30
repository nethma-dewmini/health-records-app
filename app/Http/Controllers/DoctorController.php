<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::all(); 
        return view('doctors.index', compact('doctors'));
    }

  
    public function create()
    {
        return view('doctors.create');
    }

    
    public function store(Request $request)
    {
        
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:doctors,email',
            'specialty' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ]);

      
        Doctor::create($request->all());

        return redirect()->route('doctor.index')->with('success', 'Doctor created successfully.');
    }

   
    public function edit(Doctor $doctor)
    {
        return view('doctors.edit', compact('doctor'));
        
    }


    public function update(Request $request, Doctor $doctor)
    {
       
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:doctors,email,' . $doctor->id,
            'specialty' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ]);

       
        $doctor->update($request->all());

        return redirect()->route('doctors.index')->with('success', 'Doctor updated successfully.');
    }

    
    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        return redirect()->route('doctor.index')->with('success', 'Doctor deleted successfully.');
    }
}
