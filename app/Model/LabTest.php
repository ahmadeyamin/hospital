<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LabTest extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    public function labreports()
    {
        return $this->hasMany(LabReport::class);
    }


}
