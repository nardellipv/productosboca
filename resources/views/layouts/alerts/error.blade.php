@if (count($errors) > 0)
    <div class="alert alert-success text-center" role="alert">
        <h4>Revise los siguientes <span>Errores</span></h4>
        <ul>
            @foreach ($errors->all() as $error)
                <li><i class="fa fa-ban"></i> {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif