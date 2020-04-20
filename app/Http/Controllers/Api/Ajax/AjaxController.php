<?php

namespace App\Http\Controllers\Api\Ajax;

use App\Model\Staff;
use App\Model\Patient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AjaxController extends Controller
{
    public function get_patinet(Request $request)
    {

        if (!$request->filled('name')) {
            return ['error'=>'Empty'];
        }


        $patinets = Patient::
          where('is_active',true)
        ->where('name','LIKE',"%".$request->query('name')."%")
        ->orWhere('mobileno','LIKE',"%".$request->query('name')."%")
        ->limit(10)
        ->get();

        return $patinets;

    }





    public function get_doctor_opd_charge(Request $r)
    {
        if (!$r->filled('id')) {
            return ['error'=>'Empty'];
        }
        $patinets = @Staff::
        find($r->id)
        ->opdcharge()
        ->first()->standard_charge;

        return $patinets??'0';

    }
}
