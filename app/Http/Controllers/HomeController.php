<?php

namespace App\Http\Controllers;

use App\Model\Bed;
use App\Model\Patient;
use App\Model\PatientInOut;
use App\Model\Staff;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function bedstatus()
    {

        $beds = Bed::all()->groupBy(['floor', 'ward']);

        // return $beds;
        return view('bed.index', compact(['beds']));
    }

    public function patients()
    {

        $patients = Patient::latest()->paginate(20);

        // return $beds;
        return view('patient.index', compact(['patients']));
    }

    public function test()
    {
        $d = new Bed;
        return $d->isFilled(44);
    }

    public function get_opd()
    {
        $opds = PatientInOut::with(
            [
                'doctor:name,id,phone',
                'patient:name,id,mobileno,gender,age,guardian_name',
            ]
        )->where('type', 'opd') ->latest()->paginate(20);

        $patients = Patient::latest()->get();
        $doctors = Staff::where('role','doctor')->orderBy('name','desc')->latest()->get();

        return view('opd.index', compact(['opds','patients','doctors']));
    }

    public function get_ipd()
    {
        $opds = PatientInOut::with(
            [
                'doctor:name,id,phone',
                'patient:name,id,mobileno,gender',
            ]
        )->where('type', 'ipd') ->latest()->paginate(20);


        $patients = Patient::latest()->get();
        $doctors = Staff::where('role','doctor')->orderBy('name','desc')->latest()->get();
        $beds = Bed::orderBy('floor')->get();

        return view('ipd.index', compact(['opds','patients','doctors','beds']));
    }

    public function patient_create(Request $r)
    {
        $r->validate([
            'name' => 'required',
            'gender' => 'required',
        ]);

        $patient = Patient::create([
            'name' => $r->name,
            'age' => $r->age ?? null,
            'month' => $r->month ?? null,
            'mobileno' => $r->mobileno ?? null,
            'email' => $r->email ?? null,
            'dob' => $r->dob ?? null,
            'gender' => $r->gender ?? null,
            'marital_status' => $r->marital_status ?? null,
            'address' => $r->address ?? null,
            'guardian_name' => $r->guardian_name ?? null,
            'note' => $r->note ?? null,
            // 'known_allergies' => $r->known_allergies ?? null,
            'blood_group' => $r->blood_group ?? null,
        ]);

        if ($r->ajax()) {
            if ($patient) {
                return response([
                    'success' => 'New Patient Added Successfully :)',
                    'redirect' =>  route('patients'),
                    'data' => $patient,
                ],200);
            }else{
                return response([
                    'message' => 'Somting Is Wrong Try Again',
                ],422);
            }
        }else{
            if ($patient) {
                return redirect()->back()->with('success', 'Patient Added Successfully');
            }else{
                return redirect()->back()->with('errors', 'Somting Is Wrong Try Again');
            }

        }



    }





    public function set_ipd(Request $r)
    {
        $r = $r;
        $r->validate([
            'patient' => 'required|exists:patients,id',
            'doctor' => 'required|exists:staff,id',
            'bed' => 'required|exists:beds,id',
            'appointment_date' => 'required|date',
            // 'amount' => 'required|integer',
        ]);


        $opd = PatientInOut::create([
            'patient_id' => $r->patient,
            'cons_doctor_id' => $r->doctor,
            'bed_id' => $r->bed,
            'type' => 'ipd',
            'amount' => 0,
            'appointment_date' => $r->appointment_date,
            'height' => $r->height??null,
            'weight' => $r->weight??null,
            'bp' => $r->bp??null,
            'case_type' => $r->case_type??null,
            'casualty' => $r->casualty??null,
            'symptoms' => $r->symptoms??null,
            'refference' => $r->refference??null,
            'old_patient' => $r->old_patient == "Yes"? true : false,
            'payment_mode' => 'cash',
        ]);

        if ($opd) {
            return redirect()->back()->with('success','IPD Patient Added');
        }

    }

}
