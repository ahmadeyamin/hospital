<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Model\Bed;
use App\Model\Staff;
use App\Model\Patient;
use App\Model\PatientInOut;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OPDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $opds = PatientInOut::with(
            [
                'doctor:name,id,phone',
                'patient:name,id,mobileno,gender,age,guardian_name',
            ]
        )->where('type', 'opd') ->latest()->paginate(20);

        $patients = Patient::latest()->get();
        $doctors = Staff::where('role','doctor')->orderBy('name','desc')->get();
        $references = Staff::orderBy('name','desc')->get();

        return view('opd.index', compact(['opds','patients','doctors','references']));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        return $r;

        $r->validate([
            'patient' => 'required|exists:patients,id',
            'doctor' => 'required|exists:staff,id',
            'appointment_date' => 'required|date',
            'amount' => 'required|integer',
            'payment_mode' => 'required',
            'refferencer' => 'exists:staff,id',
        ]);


        $opd = PatientInOut::create([
            'patient_id' => $r->patient,
            'cons_doctor_id' => $r->doctor,
            'bed_id' => null,
            'type' => 'opd',
            'amount' => $r->amount,
            'appointment_date' => $r->appointment_date,
            'height' => $r->height??null,
            'weight' => $r->weight??null,
            'bp' => $r->bp??null,
            'case_type' => $r->case_type??null,
            'casualty' => $r->casualty??null,
            'symptoms' => $r->symptoms??null,
            'refference' => $r->refference??null,
            'old_patient' => $r->old_patient == "Yes"? true : false,
            'payment_mode' => $r->payment_mode,
        ]);

        $opd->charges()->create([
            'patient_id' => $opd->patient_id,
            'bill_id' => null,
            'referencer_id' => null,
        ]);


        if ($r->ajax()) {
            if ($opd) {
                return response([
                    'success' => 'New Opd Patient Added :)',
                    'redirect' =>  url()->previous(),
                ],200);
            }else{
                return response([
                    'message' => 'Somting Is Wrong Try Again',
                ],422);
            }
        }else{
            if ($opd) {
                return redirect()->back()->with('success', 'Opd Patient Added');
            }else{
                return redirect()->back()->with('errors', 'Somting Is Wrong Try Again');
            }

        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
