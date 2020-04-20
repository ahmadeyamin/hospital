<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Staff extends Model
{
    use SoftDeletes;

    protected $guarded = [];
    public function patients()
    {
        return $this->hasMany(PatientInOut::class);
    }


    public function getAvaterAttribute()
    {
        $hash = md5(strtolower(trim($this->attributes['email'])));
        return "http://www.gravatar.com/avatar/$hash";
    }

    public function opdcharge()
    {
        return $this->hasOne(DoctorCharge::class,'doctor_id');
    }
}
