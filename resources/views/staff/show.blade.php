@extends('layouts.app')


@section('content')
    <div class="container-fluid">
        <div class="row">
           <div class="col-lg-4">
            <div class="iq-card">
                <div class="iq-card-body pl-0 pr-0 pt-0">
                   <div class="doctor-details-block">
                      <div class="doc-profile-bg bg-primary" style="height:150px;">
                      </div>
                      <div class="doctor-profile text-center">
                         <img src="{{ asset($staff->avater) }}" alt="profile-img" class="avatar-130 img-fluid">
                      </div>
                      <div class="text-center mt-3 pl-3 pr-3">
                         <h4><b>{{$staff->name}}</b></h4>
                         <a href="tel:{{$staff->phone}}" class="m-0">{{$staff->phone}}</a>
                         <a target="_blank" href="mailto:{{$staff->email}}" class="m-0">{{$staff->email}}</a>
                         <p class="m-0">{{$staff->role}}</p>
                         <p class="mb-0">{{$staff->specialization}}</p> | <p class="mb-0">{{$staff->qualification}}</p>

                         <br>
                      <p>{{$staff->note}}</p>

                      <a href="{{ route('staff.edit',$staff->id) }}" class="btn btn-outline-success btn-sm rounded-pill"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                      </div>
                      <hr>
                      <ul class="doctoe-sedual d-flex align-items-center justify-content-between p-0 m-0">
                         <li class="text-center">
                            <h3 class="counter">4500</h3>
                            <span>Operations</span>
                          </li>
                          <li class="text-center">
                            <h3 class="counter">100</h3>
                            <span>Hospital</span>
                          </li>
                          <li class="text-center">
                            <h3 class="counter">10000</h3>
                            <span>Patients</span>
                          </li>
                      </ul>
                   </div>
                </div>
             </div>
           </div>
        </div>
    </div>
@endsection
