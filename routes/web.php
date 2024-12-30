<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AppointmentController;

Route::get('/', function () {
    return view('welcome');
});




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::resource('patients', PatientController::class);
    Route::resource('doctors', DoctorController::class);
    Route::resource('appointments', AppointmentController::class);

    Route::get('/patient', [PatientController::class, 'index'])->name('patient.index');
    Route::get('/patient/create', [PatientController::class, 'create'])->name('patient.create');
    Route::post('/patient', [PatientController::class, 'store'])->name('patient.store');
    Route::get('/patient/{patient}/edit', [PatientController::class, 'edit'])->name('patient.edit');
    Route::put('/patient/{patient}/update', [PatientController::class, 'update'])->name('patient.update');
    Route::delete('/patient/{patient}/destroy', [PatientController::class, 'destroy'])->name('patient.destroy');

    Route::get('/doctor', [DoctorController::class, 'index'])->name('doctor.index');
    Route::get('/doctor/create', [DoctorController::class, 'create'])->name('doctor.create');
    Route::post('/doctor', [DoctorController::class, 'store'])->name('doctor.store');
    Route::get('/doctor/{doctor}/edit', [DoctorController::class, 'edit'])->name('doctor.edit');
    Route::put('/doctor/{doctor}/update', [DoctorController::class, 'update'])->name('doctor.update');
    Route::delete('/doctor/{doctor}/destroy', [DoctorController::class, 'destroy'])->name('doctor.destroy');

    Route::get('/appointment', [AppointmentController::class, 'index'])->name('appointment.index');
    Route::get('/appointment/create', [AppointmentController::class, 'create'])->name('appointment.create');
    Route::post('/appointment', [AppointmentController::class, 'store'])->name('appointment.store');
    Route::get('/appointment/{appointment}/edit', [AppointmentController::class, 'edit'])->name('appointment.edit');
    Route::put('/appointment/{appointment}/update', [AppointmentController::class, 'update'])->name('appointment.update');
    Route::delete('/appointment/{appointment}/destroy', [AppointmentController::class, 'destroy'])->name('appointment.destroy');


    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
