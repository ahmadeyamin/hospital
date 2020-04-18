@extends('layouts.app')


@section('content')
<div class="container-fluid">
    <div class="row">
       <div class="col-sm-12">
          <div class="iq-card">
             <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                   <h4 class="card-title">Doctors List</h4>


                </div>
                <a href="{{ route('staff.create') }}" class="btn btn-success float-right"> <i class="fa fa-user-plus"></i> Add Staff</a>
             </div>
          </div>
       </div>



       @forelse ($staffs as $staff)
       <div class="col-sm-6 col-md-3">
        <div class="iq-card">
           <div class="iq-card-body text-center">
              <div class="doc-profile">
              <img class="rounded-circle img-fluid avatar-80" src="{{$staff->avatar??asset('images/user/holder.png')}}" alt="profile">
              </div>
              <div class="iq-doc-info mt-3">
                 <h4>{{$staff->name}}</h4>
                 <p class="mb-0" >{{$staff->specialization ?? $staff->role}}</p>
                 <a href="javascript:void();">{{$staff->phone}}</a>
              </div>
              <div class="iq-doc-description mt-2">
                 <p class="mb-0">
                     {{$staff->note ?? 'null'}}
                 </p>
              </div>
              <a href="javascript:void();">{{$staff->email}}</a>
              <div class="iq-doc-social-info mt-3 mb-3">
                 <ul class="m-0 p-0 list-inline">
                    <li><a href="{{$staff->social_fb??'#'}}"><i class="ri-facebook-fill"></i></a></li>
                    <li><a href="{{$staff->social_tw??'#'}}"><i class="ri-twitter-fill"></i></a> </li>
                 </ul>
              </div>

              <a href="{{ route('staff.show',$staff->id) }}" class="btn btn-primary">View Profile</a>
           </div>
        </div>
     </div>
       @empty

       @endforelse


    </div>
 </div>
@endsection
