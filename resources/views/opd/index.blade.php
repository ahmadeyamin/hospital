@extends('layouts.app')


@section('css')

<link rel="stylesheet" href="https://unpkg.com/vue-select@latest/dist/vue-select.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.default.min.css" />

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<style>


.table th, .jsgrid .jsgrid-table th, .table td, .jsgrid .jsgrid-table td {
        vertical-align: middle;
        font-size: 0.875rem;
        line-height: 1;
        white-space: unset !important;
    }

    .pagination, .jsgrid .jsgrid-pager {
        overflow-x: auto;
    }
    table.dataTable thead>tr>th.sorting_asc, table.dataTable thead>tr>th.sorting_desc, table.dataTable thead>tr>th.sorting, table.dataTable thead>tr>td.sorting_asc, table.dataTable thead>tr>td.sorting_desc, table.dataTable thead>tr>td.sorting {
        padding-right: 20px;
        font-size: smaller;
        text-overflow: ellipsis;
        word-break: keep-all;
    }

    table.dataTable td, table.dataTable th {
        -webkit-box-sizing: content-box;
        box-sizing: content-box;
        /* font-size: 14px; */
    }

    .table th, .jsgrid .jsgrid-table th, .table td, .jsgrid .jsgrid-table td {
        vertical-align: middle;
        font-size: 0.875rem;
        line-height: 1;
        white-space: unset !important;
    }

    .pagination, .jsgrid .jsgrid-pager {
        overflow-x: auto;
    }


    .modal-profile-user-img{
        height: 100px;
    }
    .singlelist{
        list-style: none;
        padding: 0;
        margin: 0;
        font-size: 13px;
        /* font-weight: bold; */
    }
    .singlelist li span{
        margin-left: 10px;
    }
    .singlelist li i{
       width: 2mm
    }
    .selectize-input{
        border: 1px solid #ddd !important;
        background: #fff !important;
    }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />



@endsection



@section('content')

<div id="vue-control">


    <a href="javascript:void()" class="btn rounded mb-3 btn-sm btn-outline-success" data-toggle="modal" data-target="#exampleModalCenter">
        <i class="fa fa-plus"></i> Appoint Patient
    </a>


    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" >
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title pr-3" id="">OPD Out Patient Register </h5>


                    <a data-toggle="modal" data-dismiss="modal" aria-label="Close" onclick="$('#exampleModalCenter').modal('hide')" data-target="#add_patinet" class="btn ml-5 btn-sm btn-success rounded" href="#" role="button"><i class="fa fa-plus"></i> New Patinet</a>


                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span >&times;</span>
                    </button>


                </div>
                <div class="modal-body" >
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <form id="set_opd_form" accept-charset="utf-8" action="{{ route('set_opd') }}" enctype="multipart/form-data" method="post">
                            <div class="row row-eq">
                                <div class="col-lg-8 col-md-8 col-sm-8">




                                    <div class="row">

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="exampleInputFile">
                                                    Select Patient <span class="text-danger">*</span></label>
                                                <div>
                                                    <v-select label="name"  required :filterable="false" :options="patients" v-model="selectedpatient"
                                                    @search="onCustomerSearch" @input="customerSelected">
                                                    <template slot="no-options">
                                                        Type to search all Patinet  ..
                                                    </template>
                                                    <template slot="option" slot-scope="option">
                                                        <div class="d-center">
                                                            @{{ option.name }}

                                                            <span class="small float-right">@{{ option.mobileno }}</span>
                                                        </div>
                                                    </template>
                                                    <template slot="selected-option" slot-scope="option">
                                                        <div class="selected d-center">
                                                            @{{ option.name }}

                                                            <span class="small text-danger mt-1 ml-5">(@{{ option.mobileno }})</span>
                                                        </div>
                                                    </template>
                                                </v-select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @csrf


                                    <div id="ajax_load" v-if="selectedpatient">
                                            <input type="hidden" name="patient" :value="selectedpatient.id">
                                        <div  class="row ptt10" id="patientDetails" style="">

                                            <div class="col-md-9 col-sm-9 col-xs-9">

                                                <ul class="singlelist">
                                                    <li class="singlelist24bold">
                                                        <i class="fa fa-wheelchair" data-toggle="tooltip" data-placement="top" title="Patient"></i>
                                                    <span id="listname">Name : <b>@{{selectedpatient.name ?? 'Empty'}}</b></span></li>
                                                    <li>
                                                        <i class="fa fa-user-secret" data-toggle="tooltip" data-placement="top" title="Guardian"></i>
                                                        <span id="guardian">Guardian : <b>@{{selectedpatient.guardian_name ?? 'Empty'}}</b></span>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-venus-mars" data-toggle="tooltip" data-placement="top" title="Gender"></i>
                                                        <span id="genders">Gender : <b>@{{selectedpatient.gender ?? 'Empty'}}</b></span>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-tint" data-toggle="tooltip" data-placement="top" title="Blood Group"></i>
                                                        <span id="blood_group">Blood Group : <b>@{{selectedpatient.blood_group ?? 'Empty'}}</b></span>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-diamond" data-toggle="tooltip" data-placement="top" title="Marital Status"></i>
                                                        <span id="marital_status">Marital Status : <b>@{{selectedpatient.marital_status ?? 'Empty'}}</b></span>
                                                    </li>

                                                    <li>
                                                        <i class="fa fa-hourglass-half" data-toggle="tooltip" data-placement="top" title="Age"></i>
                                                        <span id="age">Age : <b>@{{ selectedpatient.age ?? '0 Year' }}</b></span>
                                                    </li>

                                                    <li>
                                                        <i class="fa fa-phone-square" data-toggle="tooltip" data-placement="top" title="Phone"></i>
                                                        <span id="listnumber">Phone : <b>@{{selectedpatient.phoneno ?? 'Empty'}}</b></span>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-envelope" data-toggle="tooltip" data-placement="top" title="Email"></i>
                                                        <span id="email">Email : <b>@{{selectedpatient.email ?? 'Empty'}}</b></span>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-street-view" data-toggle="tooltip" data-placement="top" title="Address"></i>
                                                        <span id="address">Address : <b>@{{selectedpatient.address??'Empty'}}</b></span>
                                                    </li>
                                                    <li>
                                                        <b>Note </b>
                                                        <span id="note">@{{selectedpatient.note??'Empty'}}</span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-3">
                                                <div class="pull-right">



                                                    <img class="modal-profile-user-img img-responsive" src="https://demo.smart-hospital.in/uploads/patient_images/no_image.png" id="image" alt="User profile picture">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">

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

                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-4 col-eq ptt10">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Appointment Date</label>
                                                <small class="req">*</small>

                                                <input type="text" id="appointment_date" data-toggle="datetimepicker" data-target="#appointment_date" name="appointment_date" autocomplete="off" placeholder="Appointment Date" class="form-control date">
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


                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="refferencer">
                                                    Refference By</label><small class="text-danger"> *</small>
                                                <select class="" name="refferencer" id="refferencer">
                                                    <option value="">Select Refferencer</option>
                                                    @foreach ($references as $reference)
                                                    <option value="{{$reference->id}}">{{$reference->role == 'doctor' ? 'Dr.' : '' }} {{$reference->name}}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="referencer_type">Type</label><span class="text-danger">*</span>
                                                <select name="referencer_type" id="referencer_type">
                                                    <option value="m">Amount</option>
                                                    <option value="p">Persent ( % )</option>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="referencer_amount">Amount (৳)</label><span class="text-danger">*</span><input type="text" name="referencer_amount" id="referencer_amount" class="form-control">

                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="exampleInputFile">
                                                    Consultant Doctor</label><small class="text-danger"> *</small>
                                                <select class="" name="doctor" id="doctor">
                                                    <option value="">Select Doctor</option>

                                                    @foreach ($doctors as $doctor)
                                                    <option value="{{$doctor->id}}">{{$doctor->name}}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger"></span>
                                            </div>
                                        </div>




                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Standerd (৳)</label><span class="text-danger">*</span><input type="number" disabled name="standerd_charge" id="standerd_charge" class="form-control">

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Applied (৳)</label><span class="text-danger">*</span><input type="number" v-model:value="opdbox.apply_charge" name="apply_charge" id="apply_charge" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Received (৳)</label><span class="text-danger">*</span><input type="number"  min="0" :max="opdbox.apply_charge" v-model:value="opdbox.paid_amount" name="paid_amount" id="paid_amount" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Due (৳)</label><span class="text-danger">*</span>
                                                <input type="number" :value="opdbox.apply_charge - opdbox.paid_amount" disabled name="due_amount" id="due_amount" class="form-control">
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

                                </div>

                            </div>


                            <div class="row">
                                <div class="box-footer">

                                    <div class="pull-right mrminus8">
                                        <button type="submit" class="btn mx-2 btn-info pull-right">Save Only</button>
                                        <button type="button" id="submit_make_bill" class="btn btn-success ">Save And Make Bill</button>
                                    </div>


                                </div>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="card">
    <div class="card-body">
        <div class="table-responsive col-sm-12">
            <table class="table dataTable table-hover mb-3 table-bordered" id="opd-table">
                <thead>
                    <tr>
                        <th width="5%">Serial</th>
                        <th width="15%">Patinet</th>
                        <th width="16%">Guardian Name</th>
                        <th width="10%">Gender</th>
                        <th width="5%">Phone</th>
                        <th width="10%">Doctor</th>
                        <th width="10%">Amount</th>
                        <th width="13%">Last Visit</th>
                        <th width="30%">Action</th>
                    </tr>
                </thead>

            </table>


            <div class="ml-5">
            </div>
        </div>
    </div>
    </div>

    <div class="modal fade" id="add_patinet" tabindex="-1" role="dialog" aria-labelledby="add_patinet" >
        <form action="{{ route('patient.create') }}" method="post" @submit="createPatient" id="add_patinet_form">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="ptt10">
                            <div class="row row-eq">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Name</label><small class="req"> *</small>
                                                <input id="name" name="name" placeholder="" type="text" class="form-control"
                                                    value="" autocomplete="off">
                                                <span class="text-danger"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Guardian Name</label>
                                                <input type="text" name="guardian_name" placeholder="" value=""
                                                    class="form-control" autocomplete="off">
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-12">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label> Gender</label>
                                                        <select class="form-control" name="gender" id="addformgender">
                                                            <option value="">Select</option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="dob">Date Of Birth</label>
                                                        <input type="text" id="birth_date" data-toggle="datetimepicker" data-target="#birth_date" name="dob" autocomplete="off" placeholder=""
                                                            class="form-control date"> </div>
                                                </div>

                                                <div class="col-sm-5" id="calculate">
                                                    <div class="form-group">
                                                        <label>Age</label>
                                                        <div style="clear: both;overflow: hidden;">
                                                            <input type="text" placeholder="Year" name="age" id="age_year"
                                                                value="" class="form-control"
                                                                style="width: 43%; float: left;">
                                                            <input type="text" id="age_month" placeholder="Month"
                                                                name="month" value="" class="form-control"
                                                                style="width: 53%;float: left; margin-left: 4px;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-12">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Blood Group</label>
                                                        <select name="blood_group" class="form-control">
                                                            <option value="">Select</option>
                                                            <option value="O+">O+</option>
                                                            <option value="A+">A+</option>
                                                            <option value="B+">B+</option>
                                                            <option value="AB+">AB+</option>
                                                            <option value="O-">O-</option>
                                                            <option value="A-">A-</option>
                                                            <option value="B-">B-</option>
                                                            <option value="AB-">AB-</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="pwd">Marital Status</label>
                                                        <select name="marital_status" class="form-control"
                                                            autocomplete="off">
                                                            <option value="">Select</option>
                                                            <option value="Single">Single</option>
                                                            <option value="Married">Married</option>
                                                            <option value="Widowed">Widowed</option>
                                                            <option value="Separated">Separated</option>
                                                            <option value="Not Specified">Not Specified</option>
                                                        </select>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>

                                        @csrf

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="pwd">Phone</label>
                                                <input id="number" autocomplete="off" name="mobileno" type="text"
                                                    placeholder="" class="form-control" value="">
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" placeholder="" id="addformemail" value="" name="email"
                                                    class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="address">Address</label>
                                                <input name="address" placeholder="" class="form-control"> </div>
                                        </div>


                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="pwd">Remarks</label>
                                                <textarea name="note" id="note" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            {{-- <div class="form-group">
                                                <label for="email">Any Known Allergies</label>
                                                <textarea name="known_allergies" id="" placeholder="" class="form-control"></textarea>
                                            </div> --}}
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-danger">Clear</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit"  class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </form>

</div>


@endsection



@section('js')


<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.20/js/dataTables.bootstrap4.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-select/3.10.1/vue-select.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/selectize.min.js"></script>

<script>


Vue.component('v-select', VueSelect.VueSelect);
var app = new Vue({

  el: '#vue-control',
  data() {
   return {
        message: '{{route('ajax.get_patinet')}}',

        patients:[],

        opdbox:{},


        selectedpatient : '',

        hasSelectedpatient :false,


   }


  },


  methods: {
    onCustomerSearch(search, loading) {
      loading(true);
      this.searchCustomer(loading, search, this);
    },
    searchCustomer: (loading, search, app) => {
        if ( search.length < 1 ) {
            loading(false);
        }else{
            fetch(
                `{{route('ajax.get_patinet')}}?name=${escape(search)}`
            )
            .then(res => {
                res.json().then(data => (app.patients = data));

                loading(false);
            });
        }
    },

    createPatient:e=>{
        e.preventDefault();
        var form = $('#add_patinet_form');
            var url = form.attr('action');

            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(), // serializes the form's elements.
                success: function(data){

                    if (data.success) {
                        app.selectedpatient = data.data;
                        app.patients = [data.data];
                        toastr["success"](data.success);
                        $('#add_patinet').modal('hide');
                        $('#add_patinet_form').trigger("reset");
                        $('#exampleModalCenter').modal('show');
                    }
                },
                error:reject=>{
                    if( reject.status === 422 ) {
                        toastr["warning"](reject.responseJSON.message??'SomeThing Is Wrong')
                        $.each(reject.responseJSON.errors, function (key, item){
                            toastr["error"](item)
                        })
                    }
                }
            });

    },

    customerSelected: (event) =>{
        app.hasSelectedpatient = true;
        app.patients = []
        app.selectedpatient = event;
        console.log(event);
        var intervall = setInterval(() => {
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            })
            intervall.clearInterval;
        }, 500);
    },
  },




})


</script>





<script>
    $(function() {
        $('#opd-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{route('ajax.get_opd')}}",
            columns: [
                { data: 'serial_id', name: 'serial_id' },
                { data: 'patient.name', name: 'patient.name' },
                { data: 'patient.guardian_name', name: 'patient.guardian_name' },
                { data: 'patient.gender', name: 'patient.gender' },
                { data: 'patient.mobileno', name: 'patient.mobileno' },
                { data: 'doctor.name', name: 'doctor.name' },
                { data: 'charge.apply_charge', name: 'charge.apply_charge' },
                { data: 'appointment_date', name: 'appointment_date' },
                { data: 'action', name: 'action', orderable: false, searchable: false}
            ],
            language: {
                oPaginate: {
                    sNext: '<i class="fa fa-forward"></i>',
                    sPrevious: '<i class="fa fa-backward"></i>',
                    sFirst: '<i class="fa fa-step-backward"></i>',
                    sLast: '<i class="fa fa-step-forward"></i>'
                }
            },
        });
    });


    //==============


    $(function () {
        $('#appointment_date').datetimepicker({
            format:'DD/MM/YYYY h:mm A',
            ampm:true
        });

        $('#doctor').selectize({
            onChange: function(query) {
                if (!query.length) return false;
                $.ajax({
                    url: '{{route('ajax.get_doctor_opd_charge')}}?id='+query,
                    type: 'GET',
                    error: function() {
                        alert('Somthing Is Worng');
                    },
                    success: function(res) {
                        console.log(res);
                        $('#standerd_charge').val(res)
                        $('#apply_charge').val(res)
                    }
                });
            }
        });
        $('#refferencer').selectize();
    });


    // set_opd_form

    $('#submit_make_bill').click(e=>{
        $("#set_opd_form").attr('action','{{ route('set_opd') }}?make_bill=yes');
        $("#set_opd_form").submit();
    })


    $("#set_opd_form").submit(function(e) {

        e.preventDefault(); // avoid to execute the actual submit of the form.

        var form = $(this);
        var url = form.attr('action');

        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(), // serializes the form's elements.
            success: function(data){
                if (data.redirect){
                        setInterval(() => {
                            window.location = data.redirect
                        }, 1000);
                }
                if (data.success) {
                        toastr["success"](data.success)
                }
            },
            error:reject=>{
                if( reject.status === 422 ) {
                    toastr["warning"](reject.responseJSON.message??'SomeThing Is Wrong')
                    $.each(reject.responseJSON.errors, function (key, item){
                        toastr["error"](item)
                    })
                }
            }
        });


        });


</script>
@endsection
