<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Model\Bed;
use Carbon\Carbon;
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

        $r->validate([
            'patient' => 'required|exists:patients,id',
            'doctor' => 'required|exists:staff,id',
            'appointment_date' => 'required|date_format:d/m/Y h:i A',
            'paid_amount' => 'required|integer',
            'payment_mode' => 'required',
            'refferencer' => 'nullable|exists:staff,id',
            'referencer_type' => 'nullable|in:p,m',
            'apply_charge' => 'required|integer|min:0',
            'serial_id' => 'nullable|unique:patient_in_outs,serial_id',
        ]);

        if ($r->filled('refferencer') && $r->referencer_type == 'p') {
            $r['referencer_amount'] = (($r->referencer_amount * $r->apply_charge) / 100);
        }

        // return $r;

        $r['appointment_date'] = Carbon::createFromFormat('d/m/Y h:i A',$r->appointment_date);

        $lastid = @PatientInOut::all()->last()->id+1 ?? 1;

        $opd = PatientInOut::create([
            'patient_id' => $r->patient,
            'cons_doctor_id' => $r->doctor,
            'serial_id' => $r->filled('serial_id') ? 'C-'.$r->input('serial_id') : 'OPD-'.$lastid,
            'bed_id' => null,
            'type' => 'opd',
            'amount' => $r->standerd_charge,
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

        $opd->charge()->create([
            'patient_id' => $opd->patient_id,
            'bill_id' => null,
            'referencer_id' => $r->refferencer,
            'reference_type' => $r->referencer_type,
            'referencer_amount' =>  $r->filled('refferencer') ? $r->referencer_amount : 0,
            'apply_charge' =>  $r->apply_charge,
            'date' =>  now(),
        ]);

        if ($r->filled('paid_amount') && $r->paid_amount > 0) {
            $opd->payments()->create([
                'patient_id' => $opd->patient_id,
                'bill_id' => null,
                'paid_amount' =>  $r->paid_amount,
                'payment_mode' =>  $r->payment_mode,
                'date' =>  now(),
                'note' =>  null,
            ]);
        }






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
