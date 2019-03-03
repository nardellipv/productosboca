@extends('layouts.admin')

@section('style')
    <link rel="stylesheet" href="{{ asset('styleAdmin/plugins/iCheck/all.css') }}">
@endsection

@section('content')
    <section class="content">
        @include('layouts.alerts.success')
        @include('layouts.alerts.error')
        <div class="row">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <div class="col-md-6 col-sm-offset-2">
                        {!! Form::model($product, ['method' => 'PATCH','route' => ['products.update', $product->id],'style'=>'display:inline','enctype' => 'multipart/form-data']) !!}
                        {{ csrf_field() }}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" name="name" class="form-control" id="name"
                                       value="{{ $product->name }}"
                                       placeholder="nombre">
                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="price">Precio</label>
                                        <input type="text" name="price" class="form-control"
                                               value="{{ $product->price }}" id="price"
                                               placeholder="precio">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="offer">Oferta</label>
                                        <input type="text" name="offer" class="form-control"
                                               value="{{ $product->offer }}" id="offer"
                                               placeholder="Oferta">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="quantity">Cantidad</label>
                                        <input type="text" name="quantity" class="form-control"
                                               value="{{ $product->quantity }}" id="quantity"
                                               placeholder="Cantidad">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Descripción</label>
                                <textarea class="form-control" name="description" rows="3"
                                          placeholder="Descripción">{{ $product->description }}</textarea>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label>Tiempo de la Oferta</label>
                                            <input type="date" class="form-control" name="offer_time"
                                                   placeholder="Tiempo Oferta">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Talles</label>
                                        <div class="form-group">
                                            @foreach($sizes as $size)
                                                <label>
                                                    <input type="checkbox" name="size[]" value="{{ $size->id }}"
                                                           class="minimal-red">
                                                    {{ $size->size }}
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Sección</label>
                                        <select class="form-control" name="section">
                                            <option value="NEW">Nuevos</option>
                                            <option value="MOSTSELL">Más Vendidas</option>
                                            <option value="OTHER">Otros</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Categoría</label>
                                        <select class="form-control" name="category_id">
                                            <option value="{{ $product->category->id }}">{{ $product->category->name }}</option>
                                            <option>----------------------</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Miniaturas</label>
                                <input type="file" name="thum" id="exampleInputFile" multiple>
                            </div>
                        </div>

                        <div class="box box-default collapsed-box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Imagenes</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                                class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <img src="{{ asset('images/products/'.$product->photo) }}"
                                             class="img-responsive"
                                             width="30%">
                                        <p>Imagen de portada</p>
                                        @foreach($pictures as $picture)
                                            <div class="col-sm-6">
                                            <img src="{{ asset('images/products/'.$picture->url) }}"
                                                 class="img-responsive" width="30%">
                                            <p>Imagen de miniatura</p>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Agregar Producto</button>
                        </div>
                        {!! Form::Close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="{{ asset('styleAdmin/plugins/iCheck/icheck.min.js') }}"></script>
    <script>
        $(function () {
            //iCheck for checkbox and radio inputs
            $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                checkboxClass: 'icheckbox_minimal-blue',
                radioClass: 'iradio_minimal-blue'
            });
            //Red color scheme for iCheck
            $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                checkboxClass: 'icheckbox_minimal-red',
                radioClass: 'iradio_minimal-red'
            });
        });
    </script>
@endsection