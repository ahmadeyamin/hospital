@extends('layouts.app')

@section('content')


@foreach ($beds as $floors)

<fieldset class="floormain mt-3">
    <legend>
        <h4>{{$beds->keys()[$loop->index]}} Floor</h4>
    </legend>
    <div class="row">
        @foreach ($floors as $words)
        <div class="col-md-12">
            <fieldset class="bedgroups">
                <legend class="text-center floorwardbg">
                    <h4 class="">{{$floors->keys()[$loop->index]}} Ward</h4>
                </legend>

                <div class="row">
                    @foreach ($words as $bed)
                    <div class="col-md-1">
                        @if ($ipd = $bed->isFilled($bed->id))
                        <a href="#" data-trigger="hover" class="beddetail_popover">
                            <div class="">
                                <div class="bedred"><i class="fa fa-bed"></i>
                                    <div class="bedtpmiuns6">{{$ipd->patient->name}}</div>
                                    {{-- {{$bed}} --}}
                                </div>
                            </div>
                        </a>
                        <div class="bed_detail_popover" style="display: none">
                            Bed No. : {{$bed->bed_no}} <br>Patient Id : {{$ipd->patient_id}} <br>Admission Date : {{$ipd->appointment_date}} <br>Phone : {{$ipd->patient->mobileno}}
                            <br>Gender : {{$ipd->patient->gender}}<br>Guardian Name : {{$ipd->patient->guardian_name}}<br>Consultant : {{$ipd->doctor}}
                        </div>
                        @else
                        <a href="#" class="beddetail_popover">
                            <div class="">
                                <div class="bedgreen"><i class="fa fa-bed"></i>
                                    <div class="bedtpmiuns6">{{$bed->bed_no}}</div>

                                </div>
                            </div>
                        </a>
                        @endif

                    </div>
                    @endforeach

                </div>

            </fieldset>
        </div>

        @endforeach




    </div>
</fieldset>

@endforeach


@endsection



@section('js')
<script type="text/javascript">
    $(document).ready(function() {
        $('.beddetail_popover').popover({
            placement: 'right'
            , trigger: 'hover'
            , container: 'body'
            , html: true
            , content: function() {
                return $(this).closest('div').find('.bed_detail_popover').html();
            }
        });
    });

</script>
@endsection
