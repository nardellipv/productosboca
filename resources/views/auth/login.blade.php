@extends('layouts.app')

@section('content')
    <div class="content">
        <!--login-->
        <div class="login">
            <div class="main-agileits">
                <div class="form-w3agile">
                    <h3>Ingresar a Boca América</h3>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="key">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <input type="text" value="{{ old('email') }}" placeholder="EMail" name="email"
                                   class="{{ $errors->has('email') ? ' is-invalid' : '' }}" required="">
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                            <div class="clearfix"></div>
                        </div>
                        <div class="key">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                            <input type="password" placeholder="password" name="password"
                                   class="{{ $errors->has('password') ? ' is-invalid' : '' }}" required="">
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                            <div class="clearfix"></div>
                        </div>
                        <input type="submit" value="{{ __('Login') }}">
                    </form>
                </div>
                <div class="forg">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">
                            {{ __('Olvide mi password') }}
                        </a>
                    @endif
                    <a href="{{ url('register') }}" class="forg-right">Registrarme</a>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
