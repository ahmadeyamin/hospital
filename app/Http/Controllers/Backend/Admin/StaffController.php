<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Model\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffs = Staff::latest()->get();
        return view('staff.index',compact('staffs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staff.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        // return $r;
        $r->validate([
            'name' => 'required|min:3',
            'department' => 'required',
            'join_date' => 'date',
            'phone' => 'required',
            'c_address' => 'required',
            'staff_id' => 'unique:staff,staff_id',
            'role' => 'required|in:admin,accountant,doctor,pharmacist,laboratorist,peceptionist',
            'gender' => 'required|in:male,female',
        ]);

        $staff = Staff::create([
            'name' => $r->name,
            'staff_id' => $r->staff_id,
            'role' => $r->staff_id,
            'phone' => $r->phone,
            'email' => $r->email,
            'e_phone' => $r->e_phone,
            'gender' => $r->gender,
            'blood_group' => $r->blood_group,
            'date_of_birth' => $r->date_of_birth,
            'marital_status' => $r->marital_status,
            'father_name' => $r->father_name,
            'mother_name' => $r->mother_name,
            'qualification' => $r->qualification,
            'experience' => $r->experience,
            'specialization' => $r->specialization,
            'b_salary' => $r->b_salary,
            'work_shift' => $r->work_shift,
            'p_address' => $r->p_address,
            'c_address' => $r->c_address,
            'p_address' => $r->p_address,
            'bank_account' => $r->bank_account,
            'bank_name' => $r->bank_name,
            'bank_branch' => $r->bank_branch,
            'bank_account_no' => $r->bank_account_no,
            'bank_swift_no' => $r->bank_swift_no,
            'social_fb' => $r->social_fb,
            'social_tw' => $r->social_tw,
            'social_li' => $r->social_li,
            'social_in' => $r->social_in,
            'note' => $r->note,
        ]);

        if ($staff) {
            return response([
                'success' => 'New Staff Added Successfully :)',
                'redirect' =>  route('staff'),
            ],200);
        }else{
            return response([
                'message' => 'Somting Is Wrong Try Again',
            ],422);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Staff $staff)
    {
        return view('staff.show',compact('staff'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $staff = Staff::findOrFail($id);

        return view('staff.edit',compact(['staff']));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, $id)
    {
        $staff = Staff::findOrFail($id);

        $r->validate([
            'name' => 'required|min:3',
            'department' => 'required',
            'join_date' => 'date',
            'phone' => 'required',
            'c_address' => 'required',
            'staff_id' => 'unique:staff,staff_id,'.$id,
            'role' => 'required|in:admin,accountant,doctor,pharmacist,laboratorist,peceptionist',
            'gender' => 'required|in:male,female',
        ]);

        $staff->update([
            'name' => $r->name,
            'staff_id' => $r->staff_id,
            'role' => $r->staff_id,
            'phone' => $r->phone,
            'email' => $r->email,
            'e_phone' => $r->e_phone,
            'gender' => $r->gender,
            'blood_group' => $r->blood_group,
            'date_of_birth' => $r->date_of_birth,
            'marital_status' => $r->marital_status,
            'father_name' => $r->father_name,
            'mother_name' => $r->mother_name,
            'qualification' => $r->qualification,
            'experience' => $r->experience,
            'specialization' => $r->specialization,
            'b_salary' => $r->b_salary,
            'work_shift' => $r->work_shift,
            'p_address' => $r->p_address,
            'c_address' => $r->c_address,
            'p_address' => $r->p_address,
            'bank_account' => $r->bank_account,
            'bank_name' => $r->bank_name,
            'bank_branch' => $r->bank_branch,
            'bank_account_no' => $r->bank_account_no,
            'bank_swift_no' => $r->bank_swift_no,
            'social_fb' => $r->social_fb,
            'social_tw' => $r->social_tw,
            'social_li' => $r->social_li,
            'social_in' => $r->social_in,
            'note' => $r->note,
        ]);

        if ($staff) {
            return response([
                'success' => 'New Staff Updated Successfully :)',
                'redirect' =>  route('staff'),
            ],200);
        }else{
            return response([
                'message' => 'Somting Is Wrong Try Again',
            ],422);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $staff = Staff::findOrFail($id);

        $try = $staff->delete();

        if ($try) {
            return response([
                'success' => 'Staff Deleted Successfully :)',
                'redirect' =>  route('staff'),
            ],200);
        }else{
            return response([
                'message' => 'Somting Is Wrong Try Again',
            ],422);
        }

    }
}
