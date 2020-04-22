<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PatientInOut extends Model
{
    protected $guarded = [];

    use SoftDeletes;
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Staff::class, 'cons_doctor_id', 'id');
    }

    public function charge()
    {
        return $this->morphOne(PatientCharge::class, 'chargeable');
    }

    public function bed()
    {
        return $this->hasOne(Bed::class);
    }

    public function payments()
    {
        return $this->morphOne(Payment::class, 'paymentable');
    }



}
