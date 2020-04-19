@extends('layouts.app')


@section('css')


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />



    <style>
        .text-over {
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            max-width: 150px;
        }
    </style>
@endsection



@section('content')

<div>




<a href="javascript:void()" class="btn rounded mb-3 btn-sm btn-outline-success" data-toggle="modal" data-target="#exampleModal">
    <i class="fa fa-plus"></i> Add New Patient
</a>



<div class="card">

    <h2 class="card-title text-center">All Patient List</h2>
    <div class="card-body">


        <table class="table border table-striped table-inverse table-responsive">
            <thead class="thead-inverse">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Age</th>
                    <th scope="col">Gender</th>
                    <th scope="col" class="text-over">Guardian Name</th>
                    <th scope="col" class="text-over">Address</th>
                    <th scope="col" class="text-over">Bed</th>
                </tr>
            </thead>
            <tbody>



                @foreach ($patients as $patien)
                <tr>
                    <th scope="row">{{$patien->id}}</th>
                    <td>{{$patien->name}}</td>
                    <td>{{$patien->mobileno??'Null'}}</td>
                    <td>{{$patien->age??'Null'}}</td>
                    <td>{{$patien->gender??'Null'}}</td>
                    <td>{{$patien->guardian_name??'Null'}}</td>
                    <td>{{$patien->address??'Null'}}</td>
                    <td>{{$patien->hasBed()->bed_id??'Null'}}</td>
                </tr>
                @endforeach




            </tbody>
        </table>


        <br>


        {{$patients->links()}}




    </div>
</div>

</div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <form action="{{ route('patient.create') }}" method="post" id="form">
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
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </form>
</div>



@endsection




@section('js')

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>


<script>
    $(document).ready(function(){
            $("#birth_date").blur(function(){
                var mdate = $("#birth_date").val().toString();
                var yearThen = parseInt(mdate.substring(6,10), 10);
                var monthThen = parseInt(mdate.substring(3,5), 10);
                var dayThen = parseInt(mdate.substring(0,2), 10);

                var today = new Date();
                var birthday = new Date(yearThen, monthThen-1, dayThen);

                var differenceInMilisecond = today.valueOf() - birthday.valueOf();

                var year_age = Math.floor(differenceInMilisecond / 31536000000);
                var day_age = Math.floor((differenceInMilisecond % 31536000000) / 86400000);


                var month_age = Math.floor(day_age/30);

                day_age = day_age % 30;

                if (isNaN(year_age) || isNaN(month_age) || isNaN(day_age)) {
                    console.log("Invalid birthday - Please try again!");
                }
                else {
                    $('#age_year').val(year_age >= 1 ? year_age : '' );
                    $('#age_month').val(month_age >= 1 ? month_age : '' );

                }
            });
        });



        // $('#birth_date').datetimepicker({
        //     // format: "yyyy-mm-dd",
        //     // calendarWeeks: true,
        //     // autoclose: true,
        //     // todayHighlight: true,
        // });


        $(function () {
            $('#birth_date').datetimepicker({
                format: "DD-MM-YYYY",
            });
        });


        $("#form").submit(function(e) {

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
