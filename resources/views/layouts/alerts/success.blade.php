@if (Session::has('message'))
    <div class="alert alert-success text-center" role="alert">
        <strong><i class="fa fa-thumbs-up fa-2x"></i> ¡¡¡Perfecto!!!</strong> {!! Session::get('message') !!}
    </div>
@endif