<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PatientCharge extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    public function chargeable()
    {
        return $this->morphTo();
    }

    public function bill()
    {
        return $this->belongsTo(Bill::class);
    }

    public function patient()
    {
        return $this->hasOne(Patient::class);
    }


}
