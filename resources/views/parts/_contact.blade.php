@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="mail-w3ls">
            <div class="container">
                @include('layouts.alerts.success')
                @include('layouts.alerts.error')
                <h2 class="tittle">Contacto</h2>
                <div class="mail-grids">
                    <div class="mail-bottom">
                        <h4>Contactenos por cualquier consulta</h4>
                        {!! Form::open(['method' => 'POST','route' => ['sendEmail']]) !!}
                        {{ csrf_field() }}
                            <input type="text" name="name" id="name" placeholder="Nombre" value="{{ old('name') }}" required>
                            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                            <input type="text" name="phone" placeholder="Teléfono" value="{{ old('phone') }}" required>
                            <textarea name="mensaje" placeholder="Mensaje..." required>{{ old('mensaje') }}</textarea>
                        {!! Recaptcha::render() !!}
                            <input type="submit" value="Enviar">
                            <input type="reset" value="Borrar">
                        {!! Form::Close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection