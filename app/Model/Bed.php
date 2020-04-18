<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bed extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    public function patients()
    {
        return $this->hasMany(Patient::class);
    }

    public function isFilled($id)
    {
        $argc = PatientInOut::where([
            'bed_id' => $id,
            'type' => 'ipd',
            'discharged' => false,
        ])->first();

        if ($argc) {

            $argc->doctor = Staff::find($argc->cons_doctor_id)->name;
            $argc->patient = Patient::find($argc->patient_id);
            return $argc;
        }

        return $argc;
    }

}
