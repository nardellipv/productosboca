@extends('layouts.app')

@section('content')
    <section class="order_details section_gap">
        <div class="container">
            <br><br><br>
            <h3 class="title_confirmation">Verificar Email.</h3>
                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('Se ha enviado un nuevo enlace de verificación a su dirección de correo electrónico.') }}
                    </div>
                @endif
                {{ __('Antes de continuar por favor verifica tu email. Revisa también en la carpeta de spam.') }}
                {{ __('Si no te ha llegado el mail') }}, <a
                        href="{{ route('verification.resend') }}">{{ __('click aquí para enviar nuevamente el mail.') }}
            </div>
    </section>
@endsection
