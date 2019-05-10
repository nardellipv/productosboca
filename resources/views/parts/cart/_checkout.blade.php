@extends('layouts.app')

@section('content')
    <section class="checkout_area section_gap">
        <div class="container">
            @if(!Auth::check())
                <div class="returning_customer">
                    <div class="check_title">
                        <h2>Comprar con un usuario <a href="{{ url('register') }}">Registrarse</a></h2>
                    </div>
                    <p>Puede realizar la compra sin un usuario registrado, igualmente recomendamos registrarse ya que se
                        envían email con promociones y
                        excelentes descuentos en muchos productos.</p>
                    <form class="row contact_form" action="{{ route('login') }}" method="post" novalidate="novalidate">
                        @csrf
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                   value="{{ old('email') }}" placeholder="EMail" name="email" required>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="col-md-6 form-group p_star">
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
                            <button type="submit" value="submit" class="primary-btn">Ingresar</button>
                            <div class="creat_account">
                                <input type="checkbox" id="f-option" name="selector">
                                <label for="f-option">Recordarme</label>
                            </div>
                            <br>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}"> Olvide mi Password</a>
                            @endif
                        </div>
                    </form>
                </div>
            @endif
            <div class="billing_details">
                <div class="row">
                    <div class="col-lg-8">
                        <h3>Datos del usuario</h3>
                        {!! Form::open(['method' => 'POST','route' => ['checkoutPay'],'class'=>'row contact_form']) !!}
                        {{ csrf_field() }}

                        @if(!Auth::check())
                            <div class="col-md-6 form-group p_star">
                                <input class="form-control" id="id_first_name" name="name"
                                       required="required" type="text" value="{{ old('name') }}"/>
                                <span class="placeholder" data-placeholder="Nombre"></span>
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input class="form-control" id="id_last_name"
                                       name="lastname"
                                       required="required" type="text" value="{{ old('lastname') }}"/>
                                <span class="placeholder" data-placeholder="Apellido"></span>
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input class="form-control" id="id_phone" name="phone"
                                       type="text" value="{{ old('phone') }}"/>
                                <span class="placeholder" data-placeholder="Teléfono"></span>
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input class="form-control" id="id_email" name="email"
                                       required="required" type="email" value="{{ old('email') }}"/>
                                <span class="placeholder" data-placeholder="Email"></span>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <select class="country_select" name="state">
                                    <option value="CIUDAD AUTÓNOMA DE BUENOS AIRES"
                                            selected>
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
                            <div class="col-md-12 form-group p_star">
                                <input class="form-control" id="id_address_line_1"
                                       name="address" required="required" type="text" value="{{ old('address') }}"/>
                                <span class="placeholder" data-placeholder="Dirección"></span>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input class="form-control" id="id_city" name="city"
                                       required="required" type="text" value="{{ old('city') }}"/>
                                <span class="placeholder" data-placeholder="Localidad"></span>
                            </div>
                            <div class="col-md-12 form-group">
                                <input class="form-control" id="id_postalcode"
                                       name="postalcode"
                                       required="required" type="text" value="{{ old('postalcode') }}"
                                       placeholder="Código Postal"/>
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="creat_account">
                                    <h3>Observaciones</h3>
                                </div>
                                <textarea class="form-control" id="note"
                                          name="note">{{ old('note') }}</textarea>
                            </div>
                            @if($subTotal == 0)
                                <input name="price" value="{{ $totalCart }}" hidden>
                            @else
                                <input name="price" value="{{ $subTotal  }}" hidden>
                            @endif
                            {{--<input name="productName" value="{{ $productCart->product->name }}" hidden>--}}
                            <input name="serial_buy" value="{{ $serial_buy }}" hidden>
                        @else
                            <div class="col-md-6 form-group p_star">
                                <input class="form-control" id="id_first_name" name="name"
                                       required="required" type="text" value="{{ Auth::user()->name}}"/>
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input class="form-control" id="id_last_name"
                                       name="lastname"
                                       required="required" type="text" value="{{ Auth::user()->lastname}}"/>
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input class="form-control" id="id_phone" name="phone"
                                       type="text" value="{{ Auth::user()->phone}}"/>
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input class="form-control" id="id_email" name="email"
                                       required="required" type="email" value="{{ Auth::user()->email}}"/>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <select class="country_select" name="state">
                                    <option value="{{ Auth::user()->state }}">{{ Auth::user()->state }}</option>
                                    <option value="CIUDAD AUTÓNOMA DE BUENOS AIRES"
                                            disabled>
                                        Ciudad Autónoma de Buenos Aires
                                    </option>
                                    <option value="BUENOS AIRES" disabled>
                                        Buenos Aires
                                    </option>
                                    <option value="CATAMARCA" disabled>
                                        Catamarca
                                    </option>
                                    <option value="CHACO" disabled>
                                        Chaco
                                    </option>
                                    <option value="CHUBUT" disabled>
                                        Chubut
                                    </option>
                                    <option value="CORRIENTES" disabled>
                                        Corrientes
                                    </option>
                                    <option value="CÓRDOBA" disabled>
                                        Córdoba
                                    </option>
                                    <option value="ENTRE RÍOS" disabled>
                                        Entre Ríos
                                    </option>
                                    <option value="FORMOSA" disabled>
                                        Formosa
                                    </option>
                                    <option value="JUJUY" disabled>
                                        Jujuy
                                    </option>
                                    <option value="LA PAMPA" disabled>
                                        La Pampa
                                    </option>
                                    <option value="LA RIOJA" disabled>
                                        La Rioja
                                    </option>
                                    <option value="MENDOZA" disabled>
                                        Mendoza
                                    </option>
                                    <option value="MISIONES" disabled>
                                        Misiones
                                    </option>
                                    <option value="NEUQUÉN" disabled>
                                        Neuquén
                                    </option>
                                    <option value="RÍO NEGRO" disabled>
                                        Río Negro
                                    </option>
                                    <option value="SALTA" disabled>
                                        Salta
                                    </option>
                                    <option value="SAN JUAN" disabled>
                                        San Juan
                                    </option>
                                    <option value="SAN LUIS" disabled>
                                        San Luis
                                    </option>
                                    <option value="SANTA CRUZ" disabled>
                                        Santa Cruz
                                    </option>
                                    <option value="SANTA FE" disabled>
                                        Santa Fe
                                    </option>
                                    <option value="SANTIAGO DEL ESTERO" disabled>
                                        Santiago Del Estero
                                    </option>
                                    <option value="TIERRA DEL FUEGO" disabled>
                                        Tierra Del Fuego
                                    </option>
                                    <option value="TUCUMÁN" disabled>
                                        Tucumán
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input class="form-control" id="id_address_line_1"
                                       name="address" required="required" type="text"
                                       value="{{ Auth::user()->address }}"/>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input class="form-control" id="id_city" name="city"
                                       required="required" type="text" value="{{ Auth::user()->city }}"/>
                            </div>
                            <div class="col-md-12 form-group">
                                <input class="form-control" id="id_postalcode"
                                       name="postalcode"
                                       required="required" type="text" value="{{ Auth::user()->postalCode }}"
                                       placeholder="Código Postal"/>
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="creat_account">
                                    <h3>Observaciones</h3>
                                </div>
                                <textarea class="form-control" id="note"
                                          name="note">{{ old('note') }}</textarea>
                            </div>
                            @if($subTotal == 0)
                                <input name="price" value="{{ $totalCart }}" hidden>
                            @else
                                <input name="price" value="{{ $subTotal  }}" hidden>
                            @endif
                            {{--<input name="productName"
                                   value="{{ $productCart->product->name }}" hidden>--}}
                            <input name="serial_buy" value="{{ $serial_buy }}" hidden>
                        @endif
                    </div>
                    <div class="col-lg-4">
                        <div class="order_box">
                            <h2>Tu Orden</h2>
                            <ul class="list">
                                <li><a href="#">Producto <span>Subtotal</span></a></li>
                                @foreach($productCarts as $productCart)
                                    <li>
                                        <a href="#">
                                            {{ $productCart->product->name }}
                                            @if($subTotal == 0)
                                                <span class="last">${{$productCart->total}}</span>
                                            @else
                                                <span class="last">${{$subTotal}}</span>
                                            @endif
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                            <ul class="list list_2">
                                <li><a href="#">Total + Envío <span>${{ $costoEnvio }}</span></a></li>
                            </ul>
                            <br>
                            <div class="payment_item">
                                <h5>Método Pago</h5>
                                <small>No es necesario tener cuenta en los medios de pagos para utilizarlos.
                                </small>
                                <div class="radion_btn">
                                    <input type="radio" id="f-option5" name="payment" value="mercadopago">
                                    <label for="f-option5">MercadoPago</label>
                                    <img src="{{ asset('styleWeb/img/mediospagos/mercadopago.png') }}" width="15%">
                                    <div class="check"></div>
                                </div>
                                <p>Su pago esta protegida y respaldada a través de la plataforma de MercadoPago.</p>
                            </div>
                            <div class="payment_item active">
                                <div class="radion_btn">
                                    <input type="radio" id="f-option6" name="payment" value="payu">
                                    <label for="f-option6">PayU </label>
                                    <img src="{{ asset('styleWeb/img/mediospagos/payu.png') }}" width="15%">
                                    <div class="check"></div>
                                </div>
                                <p>PayU protege todas las transacciones realizadas en su plataforma, para garantizar un
                                    pago seguro y confiable.</p>
                            </div>
                            <div class="creat_account">
                                <input type="checkbox" id="f-option4" name="selector">
                                <label for="f-option4">He leido y aceptado los </label>
                                <a href="{{ route('termns') }}">términos y condiciones*</a>
                            </div>
                            <button type="submit" class="primary-btn">Procesar Pago</button>
                        </div>
                        {!! Form::Close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection