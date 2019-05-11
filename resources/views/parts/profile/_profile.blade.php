@extends('layouts.app')

@section('title', 'Perfil')

@section('content')
    <section class="product_description_area">
        <div class="container">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#profile" role="tab"
                       aria-controls="profile" aria-selected="true">Perfil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="password-tab" data-toggle="tab" href="#password" role="tab"
                       aria-controls="password"
                       aria-selected="false">Modificar Password</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pedidos-tab" data-toggle="tab" href="#pedidos" role="tab"
                       aria-controls="pedidos"
                       aria-selected="false">Pedidos</a>
                </li>
{{--                <li class="nav-item">
                    <a class="nav-link" id="favoritos-tab" data-toggle="tab" href="#favoritos" role="tab"
                       aria-controls="favoritos"
                       aria-selected="false">Favoritos</a>
                </li>--}}
            </ul>
            <div class="tab-content" id="myTabContent">
                {{--tab1--}}
                <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="section-top-border">
                        {!! Form::model($user, ['method' => 'PATCH','route' => ['updateData', $user->id],'style'=>'display:inline']) !!}
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label for="name">Nombre</label>
                                    <input class="form-control" id="name"
                                           name="name"
                                           value="{{ $user->name }}"
                                           required="required" type="text"/>
                                </div>
                                <div class="form-group">

                                    <label for="lastname">Apellido:</label>
                                    <input class="form-control" id="lastname"
                                           name="lastname"
                                           value="{{ $user->lastname }}"
                                           required="required" type="text"/>
                                </div>

                                <div class="form-group">

                                    <label for="email">email:</label>
                                    <input class="form-control" id="email"
                                           name="email"
                                           value="{{ $user->email }}"
                                           required="required" type="email"/>
                                </div>

                                <div class="form-group">
                                    <label for="address">Dirección:</label>
                                    <input class="form-control" id="address"
                                           name="address"
                                           value="{{ $user->address }}"
                                           required="required" type="text"/>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label for="state">Provincia:</label>
                                    <div class="default-select" id="default-select">
                                        <select name="state">
                                            <option value="{{ $user->state }}">{{ $user->state }}</option>
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

                                <div class="form-group">

                                    <label for="city">Localidad:</label>
                                    <input class="form-control" id="city"
                                           name="city"
                                           value="{{ $user->city }}"
                                           required="required" type="text"/>
                                </div>
                                <div class="form-group">

                                    <label for="id_postalcode">Código Postal:</label>
                                    <input class="form-control" id="id_postalcode"
                                           name="postalcode"
                                           value="{{ $user->postalcode }}"
                                           required="required" type="text"/>
                                </div>
                                <div class="form-group">

                                    <label for="phone">Teléfono:</label>
                                    <input class="form-control" id="phone"
                                           name="phone"
                                           value="{{ $user->phone }}"
                                           required="required" type="text"/>
                                </div>
                            </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <br>
                                    <button type="submit" class="genric-btn success" style="width:100%;">
                                        Actualizar datos
                                    </button>
                                </div>
                            </div>
                        {!! Form::Close() !!}
                    </div>
                </div>
                {{--tab2--}}
                <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
                    {!! Form::model($user, ['method' => 'PATCH','route' => ['updatePassword', $user->id],'style'=>'display:inline']) !!}
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-lg-6 col-md-6 offset-2">
                            <div class="form-group">
                                <label for="password">Nueva Contraseña:</label>
                                <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                       id="password"
                                       name="password"
                                       required="required" type="password"/>
                            </div>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                            <div class="form-group">

                                <label for="password_confirmation">Verificar Contraseña:</label>
                                <input class="form-control" id="password_confirmation"
                                       name="password_confirmation"
                                       required="required" type="password"/>
                            </div>
                        </div>
                    </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <br>
                                <button type="submit" class="genric-btn success" style="width:100%;">
                                    Actualizar datos
                                </button>
                            </div>
                        </div>
                        {!! Form::Close() !!}
                </div>
                {{--tab3--}}
                <div class="tab-pane fade" id="pedidos" role="tabpanel" aria-labelledby="pedidos-tab">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>N° Orden</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Total</th>
                            <th>Fecha Compra</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pedidos as $pedido)
                            <tr>
                                <td>{{ $pedido->serial_buy }}</td>
                                <td>{{ $pedido->product->name }}</td>
                                <td>{{ $pedido->quantity }}</td>
                                <td>${{ $pedido->total }}</td>
                                <td>{{ Date::parse($pedido->created_at)->format('j/m/Y') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{--tab4--}}
    {{--            <div class="tab-pane fade" id="favoritos" role="tabpanel" aria-labelledby="favoritos-tab">
                </div>--}}
            </div>
        </div>
    </section>
@endsection