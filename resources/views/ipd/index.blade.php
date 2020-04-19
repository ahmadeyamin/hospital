@extends('layouts.app')

@section('content')


<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter"> <i
        class="fa fa-plus"></i> Add Patient</button>


<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">IPD In Patient Register </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <form id="formadd" accept-charset="utf-8" action="{{ route('set_ipd') }}"
                        enctype="multipart/form-data" method="post">


                        <div class="row row-eq">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div id="ajax_load">




                                </div>
                                @csrf
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
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-3">
                                        <div class="pull-right">



                                            <img class="modal-profile-user-img img-responsive" src="https://demo.smart-hospital.in/uploads/patient_images/no_image.png" id="image" alt="User profile picture">
                                        </div>
                                    </div>
                                </div> --}}

                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="exampleInputFile">
                                                Select Patient <span class="text-danger">*</span></label>
                                            <div>
                                                <select name="patient" id="patient" class="form-control">

                                                    <option value="">Select Patient</option>

                                                    @foreach ($patients as $patient)
                                                    <option value="{{$patient->id}}">{{$patient->name}} ->
                                                        ({{$patient->id}})</option>
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
                                            <textarea style="height:90px !important" name="note" rows="5"
                                                class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-eq ptt10">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Appointment Date</label>
                                            <small class="text-danger"> *</small>
                                            <input id="admission_date" name="appointment_date" placeholder=""
                                                type="datetime-local" class="form-control datetime">
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleInputFile">
                                                Case</label>
                                            <div><input class="form-control" type="text" name="case">
                                            </div>
                                            <span class="text-danger"></span>
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
                                            <span class="text-danger"></span>
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
                                                TPA</label>
                                            <div>
                                                <select class="form-control" onchange="get_Charges('')"
                                                    id="organisation" name="organisation">
                                                    <option value="">Select</option>
                                                    <option value="3">CGHS </option>
                                                    <option value="2">IDBI Federal</option>
                                                    <option value="1">Star Health Insurance</option>
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


                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="bed">Bed no</label>
                                            <select name="bed" class="form-control">

                                                <option value="">Select Bed <small class="text-danger"> *</small>
                                                </option>

                                                @foreach ($beds as $bed)
                                                @php
                                                $isFilled = $bed->isFilled($bed->id);
                                                @endphp
                                                <option value="{{$bed->id}}">{{$bed->bed_no}} -> {{$bed->floor}}
                                                    @if($isFilled) (Booked) @endif</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>


                        <div class="row">
                            <div class="box-footer">

                                <div class="pull-right mrminus8">
                                    <button type="submit" id="formaddbtn" data-loading-text="Processing..."
                                        class="btn btn-info pull-right">Save</button>
                                </div>

                                <div class="pull-right" style="margin-right: 10px; ">
                                    <button type="button" data-loading-text="Processing..."
                                        class="btn btn-info pull-right printsavebtn">Save &amp; Print</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>



<div class="card-body col-12">
    <div class="pb-5">

        <div class="table-responsive">
            <table id="orders-table" class="table table-hover mb-3 table-bordered" style="width:100% !important">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th style="">Photo</th>
                        <th >Title</th>
                        <th style="">Category</th>
                        <th style="">Author</th>
                        <th style="">Content</th>
                        <th style="">Tags</th>
                        <th>view</th>
                        <th style="">Date</th>
                        <th style="">Action</th>
                    </tr>
                </thead>

            </table>


        </div>


    </div>
</div>



{{--  <div>
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
</div>  --}}



@endsection


@section('js')

<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>


<script>
    $(function () {
        $('#orders-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "",
            "aLengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "All"]
            ],
            "iDisplayLength": 15,
            "autoWidth" : false,
            order:  [0, 'desc'] ,
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'thumb',
                    name: 'thumb',
                    orderable: false
                },
                {
                    data: 'title',
                    name: 'title',
                    className: 'font-weight-bold',
                    width: '50%'
                },
                {
                    data: 'category.name',
                    name: 'category.name',
                    width: '30px'
                },
                {
                    data: 'author.name',
                    name: 'author.name',
                    width: '30px'
                },
                {
                    data: 'content',
                    name: 'content',
                    orderable: false,
                    width: '50%'
                },
                {
                    data: 'all_tags',
                    name: 'tags.name',
                    orderable: false,
                    width: '20px',

                },
                {
                    data: 'views',
                    name: 'views',
                    width: '10px'
                },
                {
                    data: 'created_at',
                    name: 'created_at',
                    width: '30px'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    width: '50px'
                }
            ],

        });

        $('#orders-table').each(function () {
            var datatable = $(this);
            // SEARCH - Add the placeholder for Search and Turn this into in-line form control
            var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
            search_input.attr('placeholder', 'Search');
            search_input.removeClass('form-control-sm');
            // LENGTH - Inline-Form control
            var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
            length_sel.removeClass('form-control-sm');
        });
    });

</script>
@endsection


@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

<style>
    /* div.dataTables_wrapper div.dataTables_paginate {

        text-align: right;
        display: block;
        padding: 0px 10px;
        margin: auto;
        text-align: center;

    }

    #orders-table_previous,
    #orders-table_next {

        border: 1px solid deepskyblue;
        padding: 5px 10px;
        border-radius: 7px;
        box-shadow: 0px 0px 5px #aaaa;
        margin: 0px 5px auto;


    }

    .paginate_button {


        padding: 5px 10px;
        margin: 0pc 2px;
        border-radius: 7px;
        box-shadow: 0px 0px 6px #aaa;
        font-size: 18px cursor: pointer;

    }

    .paginate_button.current {
        background: #aaa !important;
        color: #fff
    }

    #orders-table_paginate .ellipsis {
        padding: 2px 10px;
        margin: 0pc 2px;
        border-radius: 7px;
        background: #aaa !important;
        box-shadow: 0px 0px 6px #aaa;
        font-size: 18px;
        cursor: not-allowed;
        color: #fff
    } */

    .table th,
    .jsgrid .jsgrid-table th,
    .table td,
    .jsgrid .jsgrid-table td {
        vertical-align: middle;
        font-size: 0.875rem;
        line-height: 1;
        white-space: unset !important;
    }

    a {
        font-family: solaimanLipi
    }

    .pagination,
    .jsgrid .jsgrid-pager {
        overflow-x: auto;
    }

    .table th img,
    .jsgrid .jsgrid-table th img,
    .table td img,
    .jsgrid .jsgrid-table td img {

        width: 70px;
        height: auto;
        border-radius: 0px !important;

    }
</style>


@endsection
