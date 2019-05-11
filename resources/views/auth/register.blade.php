@extends('layouts.app')

@section('content')
    <section class="login_box_area section_gap">
        <div class="container">
            <form class="row login_form" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="col-lg-6">
                    <div class="login_form_inner">
                        <div class="col-md-12 form-group">
                            <input type="text" placeholder="Nombre" value="{{ old('name') }}"
                                   class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                                   required="">
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="col-md-12 form-group">
                            <input type="text" placeholder="Apellido" value="{{ old('lastname') }}"
                                   class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}"
                                   name="lastname"
                                   required="">
                            @if ($errors->has('lastname'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="col-md-12 form-group">
                            <input type="email" placeholder="email" name="email" required=""
                                   value="{{ old('email') }}"
                                   class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}">
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="col-md-12 form-group">
                            <input type="text" placeholder="Dirección" value="{{ old('address') }}"
                                   class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"
                                   name="address"
                                   required="">
                            @if ($errors->has('address'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="col-md-12 single-element-widget mt-30">
                            <select name="state">
                                <option value="">Seleccione su provincia</option>
                                <option value="CIUDAD AUTÓNOMA DE BUENOS AIRES">
                                    Ciudad Autónoma de Buenos Aires
                                </option>
                                <option value="BUENOS AIRES">
                                    Buenos Aires
                                </option>
                                <option value="CATAMARCA">
                                    Catamarca
                                </option>
                                <option value="CHACO">
                                    Chaco
                                </option>
                                <option value="CHUBUT">
                                    Chubut
                                </option>
                                <option value="CORRIENTES">
                                    Corrientes
                                </option>
                                <option value="CÓRDOBA">
                                    Córdoba
                                </option>
                                <option value="ENTRE RÍOS">
                                    Entre Ríos
                                </option>
                                <option value="FORMOSA">
                                    Formosa
                                </option>
                                <option value="JUJUY">
                                    Jujuy
                                </option>
                                <option value="LA PAMPA">
                                    La Pampa
                                </option>
                                <option value="LA RIOJA">
                                    La Rioja
                                </option>
                                <option value="MENDOZA">
                                    Mendoza
                                </option>
                                <option value="MISIONES">
                                    Misiones
                                </option>
                                <option value="NEUQUÉN">
                                    Neuquén
                                </option>
                                <option value="RÍO NEGRO">
                                    Río Negro
                                </option>
                                <option value="SALTA">
                                    Salta
                                </option>
                                <option value="SAN JUAN">
                                    San Juan
                                </option>
                                <option value="SAN LUIS">
                                    San Luis
                                </option>
                                <option value="SANTA CRUZ">
                                    Santa Cruz
                                </option>
                                <option value="SANTA FE">
                                    Santa Fe
                                </option>
                                <option value="SANTIAGO DEL ESTERO">
                                    Santiago Del Estero
                                </option>
                                <option value="TIERRA DEL FUEGO">
                                    Tierra Del Fuego
                                </option>
                                <option value="TUCUMÁN">
                                    Tucumán
                                </option>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="col-lg-6">
                    <div class="login_form_inner">
                        <div class="col-md-12 form-group">
                            <input type="text" placeholder="Localidad" value="{{ old('city') }}"
                                   class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city"
                                   required="">
                            @if ($errors->has('city'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="col-md-12 form-group">
                            <input type="text" placeholder="Código Postal" value="{{ old('postalcode') }}"
                                   class="form-control{{ $errors->has('postalcode') ? ' is-invalid' : '' }}"
                                   name="postalcode"
                                   required="">
                            @if ($errors->has('postalcode'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('postalcode') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="col-md-12 form-group">
                            <input type="text" placeholder="Teléfono" value="{{ old('phone') }}"
                                   class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone"
                                   required="">
                            @if ($errors->has('phone'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="col-md-12 form-group">
                            <input type="password" placeholder="Password" name="password" required=""
                                   class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}">
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="col-md-12 form-group">
                            <input type="password" class="form-control" placeholder="Confirmar Password"
                                   name="password_confirmation"
                                   required="">
                        </div>
                        <br><br>
                        <button class="genric-btn primary">{{ __('Registrarme') }}</button>
                        <br><br>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
