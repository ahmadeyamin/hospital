<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bill extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    public function patient()
    {
        return $this->hasOne(Patient::class);
    }


    public function billable()
    {
        return $this->morphTo();
    }


    public function payments()
    {
        return $this->hasMany(Payment::class);
    }


    public function charges()
    {
        return $this->hasMany(PatientCharge::class);
    }



}
