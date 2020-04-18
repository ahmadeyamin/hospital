<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Operation extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    // public function patient()
    // {
    //     return $this->hasOne(Patient::class);
    // }

    // public function doctor()
    // {
    //     return $this->hasOne(Staff::class);
    // }


}
