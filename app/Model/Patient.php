<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function opdipds()
    {
        return $this->hasMany(PatientInOut::class);
    }

    public function test()
    {
        return PatientInOut::where('patient_id', $this->id)->get();
    }

    public function hasBed()
    {
        $argc = PatientInOut::where([
            'patient_id' => $this->id,
            'type' => 'ipd',
        ])->first();

        if ($argc) {
            $argc->patient = Patient::find($argc->patient_id);
            return $argc;
        }

        return false;
    }

    public function charges()
    {
        return $this->hasMany(PatientCharge::class,'patient_id');
    }

    public function lab_reports()
    {
        return $this->hasMany(LabReport::class,'patient_id');
    }


}
