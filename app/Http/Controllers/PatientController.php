<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;



class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::all(); 
        return view('patients.index', compact('patients'));
    }

    public function create()
    {
        return view('patients.create');
    }

    
    public function store(Request $request)
    {
       
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:patients,email',
            'dob' => 'required|date',
            'phone' => 'required|string|max:20',
        ]);

     
        $newPatient = Patient::create($request->all());

        return redirect()->route('patient.index')->with('success', 'Patient created successfully.');
    }

  
    public function edit(Patient $patient)
    {
        $patient->dob = \Carbon\Carbon::parse($patient->dob)->format('Y-m-d');
        return view('patients.edit', ['patient' => $patient]);
    }

    public function update(Request $request, Patient $patient)
    {
       
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:patients,email,' . $patient->id,
            'dob' => 'required|date',
            'phone' => 'required|string|max:20',
        ]);

       
        $patient->update($request->all());

        return redirect()->route('patients.index')->with('success', 'Patient updated successfully.');
    }

   
    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect()->route('patients.index')->with('success', 'Patient deleted successfully.');
    }
}
