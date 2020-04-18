<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
    toastr.options = {
        "closeButton": true
        ,"debug": false
        , "newestOnTop": false
        , "progressBar": true
        , "positionClass": "toast-top-right"
        , "preventDuplicates": false
        , "onclick": null
        , "showDuration": "300"
        , "hideDuration": "1000"
        , "timeOut": "10000"
        , "extendedTimeOut": "2000"
        , "showEasing": "swing"
        , "hideEasing": "linear"
        , "showMethod": "fadeIn"
        , "hideMethod": "fadeOut"
    }


    @if($errors -> any())
    @foreach($errors -> all() as $error)
    toastr["error"]("{!! $error !!}");
    @endforeach
    @endif


    @if(Session::has('success'))
    toastr["success"]("{!! Session::get('success')  !!}");
    @endif

</script>
