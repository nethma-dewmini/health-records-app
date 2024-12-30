<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = ['first_name', 'last_name', 'email', 'dob', 'phone'];

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function prescriptions()
    {
        return $this->hasMany(Prescription::class);
    }
    
    protected $casts = [
        'dob' => 'date',  
    ];
}
