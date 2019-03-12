@extends('layouts.app')

@section('title', 'Perfil')

@section('content')
    <div class="content">
        <div class="products-agileinfo">
            <div class="container bootstrap snippet">
                <div class="row">
                    <div class="col-sm-10">
                        <h3>Hola, {{ Auth::user()->name }}</h3>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-3"><!--left col-->


                        <div class="text-center">
                            <img src="{{ asset('styleWeb/img/icons/user.png') }}"
                                 class="avatar img-circle img-thumbnail" alt="avatar">
                        </div>
                        <br>


                        <div class="panel panel-default">
                            <div class="panel-body">Hola, {{ Auth::user()->name }}</div>
                            <div class="panel-body">{{ Auth::user()->email }}</div>
                        </div>


                    </div><!--/col-3-->
                    <div class="col-sm-9">
                        @include('layouts.alerts.success')
                        @include('layouts.alerts.error')
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#home">Mis Datos</a></li>
                            <li><a data-toggle="tab" href="#password">Contraseña</a></li>
                            <li><a data-toggle="tab" href="#pedidos">Mis Pedidos</a></li>
                            <li><a data-toggle="tab" href=href="{{ route('logout') }}" onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">Salir</a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="home">
                                {!! Form::model($user, ['method' => 'PATCH','route' => ['updateData', $user->id],'style'=>'display:inline']) !!}
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label for="name">Nombre</label>
                                        <input class="form-control" id="name"
                                               name="name"
                                               value="{{ $user->name }}"
                                               required="required" type="text"/>
                                    </div>
                                </div>
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="lastname">Apellido:</label>
                                        <input class="form-control" id="lastname"
                                               name="lastname"
                                               value="{{ $user->lastname }}"
                                               required="required" type="text"/>
                                    </div>
                                </div>

                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="email">email:</label>
                                        <input class="form-control" id="email"
                                               name="email"
                                               value="{{ $user->email }}"
                                               required="required" type="email"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label for="address">Dirección:</label>
                                        <input class="form-control" id="address"
                                               name="address"
                                               value="{{ $user->address }}"
                                               required="required" type="text"/>
                                    </div>
                                </div>
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="state">Provincia:</label>
                                        <select class="form-control" id="id_state" name="state">
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

                                    <div class="col-xs-6">
                                        <label for="city">Localidad:</label>
                                        <input class="form-control" id="city"
                                               name="city"
                                               value="{{ $user->city }}"
                                               required="required" type="text"/>
                                    </div>
                                </div>
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="id_postalcode">Código Postal:</label>
                                        <input class="form-control" id="id_postalcode"
                                               name="postalcode"
                                               value="{{ $user->postalcode }}"
                                               required="required" type="text"/>
                                    </div>
                                </div>
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="phone">Teléfono:</label>
                                        <input class="form-control" id="phone"
                                               name="phone"
                                               value="{{ $user->phone }}"
                                               required="required" type="text"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <br>
                                        <button type="submit" class="btn btn-success btn-lg" style="width:100%;">
                                            Actualizar datos
                                        </button>
                                    </div>
                                </div>
                                {!! Form::Close() !!}

                                <hr>

                            </div><!--/tab-pane-->
                            <div class="tab-pane" id="password">
                                {!! Form::model($user, ['method' => 'PATCH','route' => ['updatePassword', $user->id],'style'=>'display:inline']) !!}
                                {{ csrf_field() }}
                                <div class="form-group">

                                    <div class="col-xs-6">
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
                                </div>
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="password_confirmation">Verificar Contraseña:</label>
                                        <input class="form-control" id="password_confirmation"
                                               name="password_confirmation"
                                               required="required" type="password"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <br>
                                        <button type="submit" class="btn btn-success btn-lg" style="width:100%;">
                                            Actualizar datos
                                        </button>
                                    </div>
                                </div>
                                {!! Form::Close() !!}

                            </div><!--/tab-pane-->
                            <div class="tab-pane" id="pedidos">
                                <div class="bs-docs-example">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection