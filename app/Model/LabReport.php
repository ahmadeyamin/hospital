<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LabReport extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    public function labtest()
    {
        return $this->belongsTo(LabTest::class,'test_id');
    }

    public function charge()
    {
        return $this->morphOne(PatientCharge::class, 'chargeable');
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function doctor()
    {
        return $this->hasOne(Staff::class,'consultant_doctor');
    }

    public function reference()
    {
        return $this->hasOne(Staff::class,'reference_id');
    }


}
