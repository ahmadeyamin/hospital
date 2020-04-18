@extends('layouts.app')


@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="container-fluid">
            <div class="row">
               <div class="col-lg-3">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">Add New User</h4>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <form method="POST" id="form" enctype="multipart/form-data" action="{{ route('staff.edit',$staff->id) }}">
                           <div class="form-group">
                              <div class="add-img-user profile-img-edit">
                                 <img class="profile-pic d-block m-auto img-fluid" src="{{ $staff->avater }}" alt="profile-pic">
                                 <div class="p-image">
                                    <label for="avatar" class="upload-button btn iq-bg-primary">File Upload</label>

                                 </div>
                              </div>
                              @csrf

                           </div>
                           <div class="form-group">
                              <label>User Role:</label>
                              <select class="form-control" id="selectuserrole">
                                 <option>Select</option>
                                 <option value="admin">Admin</option>
                                 <option value="doctor">Doctor</option>
                                 <option value="accountant">Accountant</option>
                                 <option value="pharmacist">Pharmacist</option>
                              </select>
                           </div>
                           <div class="form-group">
                              <label for="social_fb">Facebook Url:</label>
                           <input type="text" class="form-control" value="{{$staff->social_fb}}" id="social_fb" name="social_fb" placeholder="Facebook Url">
                           </div>
                           <div class="form-group">
                              <label for="social_tw">Twitter Url:</label>
                              <input type="text" class="form-control" value="{{$staff->social_tw}}" id="social_tw" name="social_tw" placeholder="Twitter Url">
                           </div>
                           <div class="form-group">
                              <label for="social_in">Instagram Url:</label>
                              <input type="text" class="form-control" value="{{$staff->social_in}}" id="social_in" name="social_in" placeholder="Instagram Url">
                           </div>
                           <div class="form-group">
                              <label for="social_li">Linkedin Url:</label>
                              <input type="text" class="form-control" value="{{$staff->social_li}}"  id="social_li" name="social_li" placeholder="Linkedin Url">
                           </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-9">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">New User Information</h4>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <div class="new-user-info">
                              <div class="row">
                                 <div class="form-group col-md-6">
                                    <label for="name">Name: <small class="text-danger"> *</small></label>
                                    <input type="text" value="{{$staff->name}}"  name="name" class="form-control" id="name" placeholder="First Name">
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="staff_id">Staff ID: <small class="text-danger"> *</small></label>
                                    <input type="text" value="{{$staff->staff_id}}"  class="form-control" name="staff_id" id="staff_id" placeholder="Staff ID">
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="c_address">Current Address: <small class="text-danger"> *</small></label>
                                    <input type="text" class="form-control" value="{{$staff->c_address}}"  id="c_address" name="c_address" placeholder="Current Address">
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="p_address">Permanent Address: <small class="text-danger"> *</small></label>
                                    <input type="text" class="form-control" value="{{$staff->p_address}}"  name="p_address" id="p_address" placeholder="Permanent Address">
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="department">Department Name:</label>
                                    <input type="text" class="form-control" value="{{$staff->department}}"  name="department" id="department" placeholder="Department Name">
                                 </div>

                                 <div class="form-group col-md-6">
                                    <label for="gender">Gander:</label>
                                        <select class="custom-select" name="gender" id="gender">
                                            <option value="" selected>Select one</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                 </div>

                                 <div class="form-group col-md-6">
                                    <label for="phone">Mobile Number:</label>
                                    <input type="text" value="{{$staff->phone}}"  class="form-control" id="phone" name="phone" placeholder="Mobile Number">
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="e_phone">Alternate Contact:</label>
                                    <input type="text" value="{{$staff->e_phone}}"  class="form-control" name="e_phone" id="e_phone" placeholder="Alternate Contact">
                                 </div>

                                 <div class="form-group col-md-6">
                                    <label for="email">Email:</label>
                                    <input type="email" value="{{$staff->email}}"  class="form-control" name="email" id="email" placeholder="Email">
                                 </div>

                                 <div class="form-group col-md-6">
                                    <label for="pno">Blood Group:</label>
                                    <select class="form-control" name="blood_group" autocomplete="off">
                                            <option value="">---Select---</option>
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
                                 <div class="form-group col-md-6">
                                    <label for="birth_date">Date Of Birth :</label>
                                    <input type="text" value="{{$staff->birth_date}}" class="form-control" name="birth_date" id="birth_date" placeholder="Date Of Birth">
                                 </div>

                                 <div class="form-group col-md-6">
                                    <label for="join_date">Date Of Join :</label>
                                    <input type="text" value="{{$staff->join_date}}"  class="form-control" name="join_date" id="join_date" placeholder="Date Of Join">
                                 </div>
                              </div>
                              <hr>
                              <div class="row">

                                <div class="col-md-6 form-group">

                                    <label for="exampleInputEmail1">Qualification</label>
                                    <textarea id="qualification"  name="qualification" placeholder="" class="form-control" autocomplete="off">{{$staff->qualification}}</textarea>
                            </div>
                            <div class="col-md-6 form-group">

                                    <label for="exampleInputEmail1">Work Experience</label>
                                    <textarea id="work_exp" name="work_exp" placeholder="" class="form-control" autocomplete="off">{{$staff->work_exp}}</textarea>

                            </div>

                            <div class="col-md-6 form-group">

                                <label for="exampleInputEmail1">Note</label>
                                <textarea id="note" name="note" placeholder="Note" class="form-control" autocomplete="off">{{$staff->note}}</textarea>

                        </div>
                              </div>
                              <button type="submit" class="btn btn-primary">Add New User</button>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
    </div>
 </div>
@endsection


@section('css')

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker3.standalone.min.css" />


@endsection


@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script>

$('#birth_date,#join_date').datepicker({
            format: "yyyy-mm-dd",
            calendarWeeks: true,
            autoclose: true,
            todayHighlight: true,
});

// $('#form').submit(e=>{
// e.preventDefault();
// console.log($('#form').serialize());
// })


// this is the id of the form
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
            toastr["error"](message)
            $.each(reject.responseJSON.errors, function (key, item){
                toastr["error"](item)
            })
        }
       }
});


});

</script>
@endsection
