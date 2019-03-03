@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="login">
            <div class="main-agileits">
                <div class="form-w3agile">
                    <h3>Verificar tu email</h3>
                </div>
                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('Se ha enviado un nuevo enlace de verificación a su dirección de correo electrónico.') }}
                    </div>
                @endif
                {{ __('Antes de continuar por favor verifica tu email. Revisa también en la carpeta de spam.') }}
                {{ __('Si no te ha llegado el mail') }}, <a
                        href="{{ route('verification.resend') }}">{{ __('click aquí para enviar nuevamente el mail.') }}
            </div>
        </div>
    </div>
@endsection
