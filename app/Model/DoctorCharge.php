<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DoctorCharge extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function doctor()
    {
        return $this->belongsTo(Staff::class);
    }
}
