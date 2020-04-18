<?php

namespace App\Http\Controllers;

use App\Model\Bed;
use App\Model\Patient;
use App\Model\PatientInOut;
use App\Model\Staff;
use Illuminate\Support\Facades\Request;

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

    public function patient_create()
    {
        request()->validate([
            'name' => 'required',
        ]);

        $patient = Patient::create([
            'name' => request()->name,
            'age' => request()->age ?? null,
            'month' => request()->month ?? null,
            'mobileno' => request()->mobileno ?? null,
            'email' => request()->email ?? null,
            'dob' => request()->dob ?? null,
            'gender' => request()->gender ?? null,
            'marital_status' => request()->marital_status ?? null,
            'address' => request()->address ?? null,
            'guardian_name' => request()->guardian_name ?? null,
            'note' => request()->note ?? null,
            // 'known_allergies' => request()->known_allergies ?? null,
            'blood_group' => request()->blood_group ?? null,
        ]);

        if ($patient) {
            return redirect()->back()->with('success', 'Patient Added Successfully');
        }

    }





    



    public function set_opd()
    {
        $r = request();
        $r->validate([
            'patient' => 'required|exists:patients,id',
            'doctor' => 'required|exists:staff,id',
            'appointment_date' => 'required|date',
            'amount' => 'required|integer',
            'payment_mode' => 'required',
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
        
        if ($opd) {
            return redirect()->back()->with('success','Opd Patient Added');
        }
        
    }




    public function set_ipd()
    {
        $r = request();
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
