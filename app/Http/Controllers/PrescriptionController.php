<?php

namespace App\Http\Controllers;

use App\Models\Prescription;
use App\Models\Patient;
use App\Models\Doctor;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    public function index()
    {
        $prescriptions = Prescription::with(['patient', 'doctor'])->get(); 
        return view('prescriptions.index', compact('prescriptions'));
    }

 
    public function create()
    {
        $patients = Patient::all();
        $doctors = Doctor::all();
        return view('prescriptions.create', compact('patients', 'doctors'));
    }

   
    public function store(Request $request)
    {
        
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'medication' => 'required|string',
            'instructions' => 'required|string',
        ]);

     
        Prescription::create($request->all());

        return redirect()->route('prescriptions.index')->with('success', 'Prescription created successfully.');
    }

   
    public function edit(Prescription $prescription)
    {
        $patients = Patient::all();
        $doctors = Doctor::all();
        return view('prescriptions.edit', compact('prescription', 'patients', 'doctors'));
    }

 
    public function update(Request $request, Prescription $prescription)
    {
       
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'medication' => 'required|string',
            'instructions' => 'required|string',
        ]);

      
        $prescription->update($request->all());

        return redirect()->route('prescriptions.index')->with('success', 'Prescription updated successfully.');
    }

    
    public function destroy(Prescription $prescription)
    {
        $prescription->delete();
        return redirect()->route('prescriptions.index')->with('success', 'Prescription deleted successfully.');
    }
}
