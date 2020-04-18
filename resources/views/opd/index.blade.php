@extends('layouts.app')

@section('content')

<!-- Large modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter"> <i class="fa fa-plus"></i> Add Patient</button>


<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">OPD Out Patient Register </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <form id="formadd" accept-charset="utf-8" action="{{ route('set_opd') }}" enctype="multipart/form-data" method="post">


                        <div class="row row-eq">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div id="ajax_load">


                                </div>
                                {{-- <div class="row ptt10" id="patientDetails" style="display:none">

                                    <div class="col-md-9 col-sm-9 col-xs-9">

                                        <ul class="singlelist">
                                            <li class="singlelist24bold">
                                                <span id="listname"></span></li>
                                            <li>
                                                <i class="fas fa-user-secret" data-toggle="tooltip" data-placement="top" title="Guardian"></i>
                                                <span id="guardian"></span>
                                            </li>
                                        </ul>
                                        <ul class="multilinelist">
                                            <li>
                                                <i class="fas fa-venus-mars" data-toggle="tooltip" data-placement="top" title="Gender"></i>
                                                <span id="genders"></span>
                                            </li>
                                            <li>
                                                <i class="fas fa-tint" data-toggle="tooltip" data-placement="top" title="Blood Group"></i>
                                                <span id="blood_group"></span>
                                            </li>
                                            <li>
                                                <i class="fas fa-ring" data-toggle="tooltip" data-placement="top" title="Marital Status"></i>
                                                <span id="marital_status"></span>
                                            </li>
                                        </ul>
                                        <ul class="singlelist">
                                            <li>
                                                <i class="fas fa-hourglass-half" data-toggle="tooltip" data-placement="top" title="Age"></i>
                                                <span id="age"></span>
                                            </li>

                                            <li>
                                                <i class="fa fa-phone-square" data-toggle="tooltip" data-placement="top" title="Phone"></i>
                                                <span id="listnumber"></span>
                                            </li>
                                            <li>
                                                <i class="fa fa-envelope" data-toggle="tooltip" data-placement="top" title="Email"></i>
                                                <span id="email"></span>
                                            </li>
                                            <li>
                                                <i class="fas fa-street-view" data-toggle="tooltip" data-placement="top" title="Address"></i>
                                                <span id="address"></span>
                                            </li>

                                            <li>
                                                <b>Any Known Allergies </b>
                                                <span id="allergies"></span>
                                            </li>
                                            <li>
                                                <b>Remarks </b>
                                                <span id="note"></span>
                                            </li>
                                        </ul>
                                    </div><!-- ./col-md-9 -->
                                    <div class="col-md-3 col-sm-3 col-xs-3">
                                        <div class="pull-right">
                                            <!--<b>Patient Photo </b>-->
                                            <!--<span id="image"></span>-->

                                            <img class="modal-profile-user-img img-responsive" src="https://demo.smart-hospital.in/uploads/patient_images/no_image.png" id="image" alt="User profile picture">
                                        </div>
                                    </div><!-- ./col-md-3 -->
                                </div> --}}

                                @csrf

                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="exampleInputFile">
                                                Select Patient <span class="text-danger">*</span></label>
                                            <div>
                                                <select name="patient" id="patient" class="form-control">

                                                    <option value="">Select Patient</option>

                                                    @foreach ($patients as $patient)
                                                    <option value="{{$patient->id}}">{{$patient->name}} -> ({{$patient->id}})</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-sm-2 col-xs-4">
                                        <div class="form-group">
                                            <label for="pwd">Height</label>
                                            <input name="height" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-2 col-xs-4">
                                        <div class="form-group">
                                            <label for="pwd">Weight</label>
                                            <input name="weight" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-2 col-xs-4">
                                        <div class="form-group">
                                            <label for="pwd">BP</label>
                                            <input name="bp" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="email">Symptoms</label>
                                            <textarea name="symptoms" class="form-control"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="pwd">Note</label>
                                            <textarea style="height:90px !important" name="note" rows="5" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!--./row-->
                            </div>
                            <!--./col-md-8-->
                            <div class="col-lg-4 col-md-4 col-sm-4 col-eq ptt10">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Appointment Date</label>
                                            <small class="req">*</small>
                                            <input id="admission_date" name="appointment_date" type="datetime-local" class="form-control datetime">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleInputFile">Case</label>
                                            <div><input class="form-control" type="text" name="case">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputFile">
                                                Casualty</label>
                                            <div>
                                                <select name="casualty" id="casualty" class="form-control">

                                                    <option value="Yes">Yes</option>
                                                    <option value="No" selected="">No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputFile">
                                                Old Patient</label>
                                            <div>
                                                <select name="old_patient" class="form-control">

                                                    <option value="Yes">Yes</option>
                                                    <option value="No" selected="">No</option>
                                                </select>
                                            </div>
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>


                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputFile">
                                                Reference</label>
                                            <div><input class="form-control" type="text" name="refference">
                                            </div>
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>


                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleInputFile">
                                                Consultant Doctor</label><small class="text-danger"> *</small>
                                            <select class="form-control" name="doctor" id="doctor">
                                                <option value="">Select Doctor</option>

                                                @foreach ($doctors as $doctor)
                                                <option value="{{$doctor->id}}">{{$doctor->name}}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>




                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Applied Charge ($)</label><small class="req"> *</small><input type="text" name="amount" id="apply_charge" class="form-control">
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="pwd">Payment Mode</label>
                                            <select name="payment_mode" class="form-control">
                                                <option value="Cash">Cash</option>
                                                <option value="Cheque">Cheque</option>
                                                <option value="Online">Transfer to Bank Account</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <!--./row-->
                            </div>
                            <!--./col-md-4-->
                        </div>
                        <!--./row-->

                        <div class="row">
                            <div class="box-footer">

                                <div class="pull-right mrminus8">
                                    <button type="submit" id="formaddbtn" class="btn btn-info pull-right">Save</button>
                                </div>


                            </div>
                        </div>
                        <!--./row-->
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>


<div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Mobile</th>
                <th scope="col">Age</th>
                <th scope="col">Gender</th>
                <th scope="col" class="text-over">Guardian Name</th>
                <th scope="col" class="text-over">Doctor</th>
                <th scope="col" class="text-over">Appointment Date </th>
                <th scope="col" class="text-over">Actions</th>
            </tr>
        </thead>
        <tbody>



            @foreach ($opds as $opd)
            <tr>
                <th scope="row">{{$opd->serial_id??$opd->id}}</th>
                <td>{{$opd->patient->name}}</td>
                <td>{{$opd->patient->mobileno??'Null'}}</td>
                <td>{{$opd->patient->age??'Null'}}</td>
                <td>{{$opd->patient->gender??'Null'}}</td>
                <td>{{$opd->patient->guardian_name??'Null'}}</td>
                <td>{{$opd->doctor->name??'Null'}}</td>
                <td>{{$opd->appointment_date??'Null'}}</td>
                <td>
                    <button class="btn btn-sm btn-primary btn-rounded">
                        Show
                    </button>
                </td>
            </tr>
            @endforeach




        </tbody>
    </table>

    {{$opds->links()}}
</div>





@endsection
