<?php

namespace App\Http\Controllers\Api\Ajax;

use App\Model\PatientInOut;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class DatatabelController extends Controller
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
        )->where('type', 'opd');



        return DataTables::of($opds)
        ->addColumn('action', function () {
            return '
            <div class="btn-group">
                <a href="#" class="btn btn-sm btn-info">
                    <i class="fa fa-eye"></i>
                </a>
                <a href="#" class="btn btn-sm btn-danger">
                    <i class="fa fa-edit"></i>
                </a>
            </div>';
        })->addColumn('total_visit',function()
        {
            return '0';
        })
        ->toJson();

        // https://colorlib.com/polygon/kiaalap/data-table.html
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
    public function store(Request $request)
    {
        //
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
