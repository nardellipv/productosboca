@extends('layouts.app')

@section('content')
    <section class="login_box_area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login_box_img">
                        <img class="img-fluid" src="{{ asset('styleWeb/img/imagenes/login.jpg') }}" alt="Boca Juniors">
                        <div class="hover">
                            <h4>¿Nuevo en el sitio?</h4>
                            <p>Si eres nuevo en el sitio, crea una cuenta</p>
                            <a class="primary-btn" href="{{ url('register') }}">Crear Cuenta</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login_form_inner">
                        <h3>Ingresar</h3>
                        <form method="POST" action="{{ route('login') }}" class="row login_form">
                            @csrf
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                       value="{{ old('email') }}" placeholder="EMail" name="email" required>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-12 form-group">
                                <input type="password"
                                       class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="name"
                                       placeholder="Password" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-12 form-group">
                                <div class="creat_account">
                                    <input type="checkbox" id="f-option2" name="selector" {{ old('remember') ? 'checked' : '' }}>
                                    <label for="f-option2">Mantenerme logueado</label>
                                </div>
                            </div>
                            <div class="col-md-12 form-group">
                                <button type="submit" value="submit" class="primary-btn">Ingresar</button>
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}">Olvide mi Password</a>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
