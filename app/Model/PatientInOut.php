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

    // public function setSerialIdAttribute($var)
    // {
    //     if ($this->type == 'opd') {
    //        return  $this->attributes['serial_id'] == null ? 'OPD'.$this->id : 'OPD'.$var->serial_id ;
    //     }else{
    //         return  $this->attributes['serial_id'] == null ? 'IPD'.$this->id : 'IPD'.$var->serial_id ;
    //     }
    // }

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
