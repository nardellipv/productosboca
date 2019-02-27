@extends('layouts.app')
@section('script')
    <style>
        .paymentWrap {
            padding: 50px;
        }

        .paymentWrap .paymentBtnGroup {
            max-width: 50%;
            margin: inherit;
        }

        .paymentWrap .paymentBtnGroup .paymentMethod {
            padding: 40px;
            box-shadow: none;
            position: relative;
        }

        .paymentWrap .paymentBtnGroup .paymentMethod.active {
            outline: none !important;
        }

        .paymentWrap .paymentBtnGroup .paymentMethod.active .method {
            border-color: #4cd264;
            outline: none !important;
            box-shadow: 0px 3px 22px 0px #7b7b7b;
        }

        .paymentWrap .paymentBtnGroup .paymentMethod .method {
            position: absolute;
            right: 3px;
            top: 3px;
            bottom: 3px;
            left: 3px;
            background-size: contain;
            background-position: center;
            background-repeat: no-repeat;
            border: 2px solid transparent;
            transition: all 0.5s;
        }
    </style>
@endsection
@section('content')
    <div class='container'>
        <div class='row' style='padding-top:25px; padding-bottom:25px;'>
            <div class='col-md-12'>
                <div id='mainContentWrapper'>
                    <div class="col-md-8 col-md-offset-2">
                        <h2 style="text-align: center;">
                            Revisar orden y completar el pago
                        </h2>
                        <hr/>
                        <a href="{{ url('/') }}" class="btn btn-info" style="width: 100%;">Agregar más productos</a>
                        <hr>
                        @if($countCart > 0)
                            <div class="shopping_cart">

                                <div class="panel-group" id="accordion">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Revisar
                                                    Orden ({{$countCart}})</a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse in">
                                            <div class="panel-body">
                                                <div class="items">
                                                    <div class="col-md-9">
                                                        <table class="table table-striped">
                                                            @foreach($productCarts as $productCart)
                                                                <tr>
                                                                    <td colspan="2">
                                                                        {!! Form::open(['method' => 'DELETE','route' => ['deleteItem', $productCart->id], 'style'=>'display:inline']) !!}
                                                                        {{ csrf_field() }}
                                                                        <button type="submit"
                                                                                class="btn btn-warning btn-sm pull-right">
                                                                            X
                                                                        </button>
                                                                        {!! Form::Close() !!}
                                                                        <b>{{ $productCart->product->name }}</b>
                                                                        <br>
                                                                        @if($productCart->product->offer)
                                                                            <p>Precio:
                                                                                $ {{ $productCart->product->offer }}</p>
                                                                        @else
                                                                            <p>Precio:
                                                                                $ {{ $productCart->product->price }}</p>
                                                                        @endif
                                                                        <p>Cantidad: {{ $productCart->quantity }}</p>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </table>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div style="text-align: center;">
                                                            <h3>Total</h3>
                                                            @if($subTotal == 0)
                                                                <h3><span style="color:green;">${{ $totalCart }}</span>
                                                                </h3>
                                                            @else
                                                                <h3>
                                                                    <del>
                                                                        <span style="color:green;">${{ $totalCart }}</span>
                                                                    </del>
                                                                </h3>
                                                                <p>${{ $subTotal }}</p>
                                                            @endif
                                                        </div>
                                                        <br><br>
                                                        <div style="text-align: center;">
                                                            <h4>Cupón</h4>
                                                            {!! Form::open(['method' => 'POST','route' => ['coupon'],'style'=>'display:inline']) !!}
                                                            {{ csrf_field() }}
                                                            <div class="input-group" style="margin: 10px -6px 0px 7px;">
                                                                <input type="text" class="form-control" name="coupon"
                                                                       placeholder="20%OFF">
                                                            </div>
                                                            <button type="submit" class="my-cart-b item_add"
                                                                    style="margin-top: 10px;">Actualizar
                                                            </button>
                                                            {!! Form::Close() !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <div style="text-align: center; width:100%;"><a style="width:100%;"
                                                                                            data-toggle="collapse"
                                                                                            data-parent="#accordion"
                                                                                            href="#collapseTwo"
                                                                                            class=" btn btn-success"
                                                                                            onclick="$(this).fadeOut(); $('#payInfo').fadeIn();">
                                                    Continuar el proceso»</a></div>
                                        </h4>
                                    </div>
                                </div>
                                {!! Form::open(['method' => 'POST','route' => ['checkout'],'style'=>'display:inline']) !!}
                                {{ csrf_field() }}
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Información
                                                de Contacto</a>
                                        </h4>
                                    </div>

                                    <div id="collapseTwo" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            @if(!Auth::check())
                                                <b>Ayúdenos a mantener su cuenta segura, verifique su información de
                                                    facturación.</b>
                                                <p>Tengo cuenta <a href="{{ url('login') }}" class="btn btn-primary">Ingresar</a>
                                                    | Me quiero
                                                    registrar <a href="{{ url('register') }}" class="btn btn-primary">Registrarme</a>
                                                </p>
                                                <br/><br/>

                                                <table class="table table-striped" style="font-weight: bold;">
                                                    <tr>
                                                        <td style="width: 175px;">
                                                            <label for="id_email">Email:</label></td>
                                                        <td>
                                                            <input class="form-control" id="id_email" name="email"
                                                                   required="required" type="email"/>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 175px;">
                                                            <label for="id_first_name">Nombre:</label></td>
                                                        <td>
                                                            <input class="form-control" id="id_first_name" name="name"
                                                                   required="required" type="text"/>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 175px;">
                                                            <label for="id_last_name">Apellido:</label></td>
                                                        <td>
                                                            <input class="form-control" id="id_last_name"
                                                                   name="lastname"
                                                                   required="required" type="text"/>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 175px;">
                                                            <label for="id_address_line_1">Dirección:</label></td>
                                                        <td>
                                                            <input class="form-control" id="id_address_line_1"
                                                                   name="address" required="required" type="text"/>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 175px;">
                                                            <label for="id_state">Provincia:</label></td>
                                                        <td>
                                                            <select class="form-control" id="id_state" name="state">
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
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 175px;">
                                                            <label for="id_city">Localidad:</label></td>
                                                        <td>
                                                            <input class="form-control" id="id_city" name="city"
                                                                   required="required" type="text"/>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 175px;">
                                                            <label for="id_postalcode">Código Postal:</label></td>
                                                        <td>
                                                            <input class="form-control" id="id_postalcode"
                                                                   name="postalcode"
                                                                   required="required" type="text"/>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 175px;">
                                                            <label for="id_phone">Teléfono:</label></td>
                                                        <td>
                                                            <input class="form-control" id="id_phone" name="phone"
                                                                   type="text"/>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 175px;">
                                                            <label for="note">Observaciones
                                                                <small>opcional:</small>
                                                            </label>
                                                        </td>
                                                        <td>
                                                        <textarea class="form-control" id="note"
                                                                  name="note"> </textarea>
                                                            @if($subTotal == 0)
                                                                <input name="price" value="{{ $totalCart }}" hidden>
                                                            @else
                                                                <input name="price" value="{{ $subTotal  }}" hidden>
                                                            @endif
                                                            <input name="productName"
                                                                   value="{{ $productCart->product->name }}" hidden>
                                                        </td>
                                                    </tr>
                                                </table>
                                            @else
                                                <table class="table table-striped" style="font-weight: bold;">
                                                    <tr>
                                                        <td style="width: 175px;">
                                                            <label for="id_email">Email:</label></td>
                                                        <td>
                                                            <input class="form-control" id="id_email" name="email"
                                                                   required="required" value="{{ Auth::user()->email}}"
                                                                   type="email" readonly/>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 175px;">
                                                            <label for="id_first_name">Nombre:</label></td>
                                                        <td>
                                                            <input class="form-control" id="id_first_name" name="name"
                                                                   value="{{ Auth::user()->name }}" readonly
                                                                   required="required" type="text"/>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 175px;">
                                                            <label for="id_last_name">Apellido:</label></td>
                                                        <td>
                                                            <input class="form-control" id="id_last_name"
                                                                   name="lastname"
                                                                   value="{{ Auth::user()->lastname }}" readonly
                                                                   required="required" type="text"/>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 175px;">
                                                            <label for="id_address_line_1">Dirección:</label></td>
                                                        <td>
                                                            <input class="form-control" id="id_address_line_1"
                                                                   value="{{ Auth::user()->address }}" readonly
                                                                   name="address" required="required" type="text"/>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 175px;">
                                                            <label for="id_state">Provincia:</label></td>
                                                        <td>
                                                            <select class="form-control" id="id_state" name="state">
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
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 175px;">
                                                            <label for="id_city">Localidad:</label></td>
                                                        <td>
                                                            <input class="form-control" id="id_city" name="city"
                                                                   value="{{ Auth::user()->city }}" readonly
                                                                   required="required" type="text"/>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 175px;">
                                                            <label for="id_postalcode">Código Postal:</label></td>
                                                        <td>
                                                            <input class="form-control" id="id_postalcode"
                                                                   name="postalcode"
                                                                   value="{{ Auth::user()->postalcode }}" readonly
                                                                   required="required" type="text"/>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 175px;">
                                                            <label for="id_phone">Teléfono:</label></td>
                                                        <td>
                                                            <input class="form-control" id="id_phone" name="phone"
                                                                   value="{{ Auth::user()->phone }}" readonly
                                                                   type="text"/>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 175px;">
                                                            <label for="note">Observaciones
                                                                <small>opcional:</small>
                                                            </label>
                                                        </td>
                                                        <td>
                                                        <textarea class="form-control" id="note"
                                                                  name="note"> </textarea>
                                                            @if($subTotal == 0)
                                                                <input name="price" value="{{ $totalCart }}" hidden>
                                                            @else
                                                                <input name="price" value="{{ $subTotal  }}" hidden>
                                                            @endif
                                                            <input name="productName"
                                                                   value="{{ $productCart->product->name }}" hidden>
                                                        </td>
                                                    </tr>
                                                </table>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <div style="text-align: center;"><a data-toggle="collapse"
                                                                                data-parent="#accordion"
                                                                                href="#collapseThree"
                                                                                class=" btn   btn-success" id="payInfo"
                                                                                style="width:100%;display: none;"
                                                                                onclick="$(this).fadeOut();
                   document.getElementById('collapseThree').scrollIntoView()">Ingresar información de pago»</a>
                                            </div>
                                        </h4>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                                <b>Elija el medio de pago</b>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseThree" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <span class='payment-errors'></span>
                                            <fieldset>
                                                <legend>No es necesario tener cuenta en los medios de pagos para utilizarlos.
                                                </legend>
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="paymentCont">
                                                            <div class="paymentWrap">
                                                                <div class="btn-group paymentBtnGroup btn-group-justified"
                                                                     data-toggle="buttons">
                                                                    <label class="btn paymentMethod active">
                                                                        <div class="method visa">
                                                                            <img src="{{ asset('styleWeb/img/mediospagos/mercadopago.png') }}">
                                                                        </div>
                                                                        <input type="radio" name="payment"
                                                                               value="mercadopago" checked>
                                                                    </label>
                                                                    <label class="btn paymentMethod">
                                                                        <div class="method master-card">
                                                                            <img src="{{ asset('styleWeb/img/mediospagos/payu.png') }}">
                                                                        </div>
                                                                        <input type="radio" name="payment" value="payu">
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </fieldset>
                                            <button type="submit" class="btn btn-success btn-lg" style="width:100%;">
                                                Procesar el pago
                                            </button>
                                            <br/>
                                            <div style="text-align: left;"><br/>
                                                Al realizar el proceso de pago usted esta de acuerdo con las <a
                                                        href="/legal/billing/">Politicas de Privacidad</a>, y los <a
                                                        href="/legal/terms/">Términos y Condiciones</a> del sitio.
                                                Si usted tiene alguna duda sobre los productos o los servicios por favor
                                                no
                                                dude en <a href="">Contactarnos</a>.
                                                Agradecemos su compra y la confiaza sobre el sitio. Al procesar el pago
                                                usted será
                                                redirigido a un sitio externo.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {!! Form::Close() !!}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
@endsection