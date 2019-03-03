@extends('layouts.admin')

@section('content')
    <section class="content">
        @include('layouts.alerts.success')
        <div class="row">
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Listado Categorías</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Categoría</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->status }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <div class="btn-group">
                                                <a href="{{ route('categories.edit', $category->id) }}"
                                                   class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                                {!! Form::open(['method' => 'DELETE','route' => ['categories.destroy', $category->id],'style'=>'display:inline']) !!}
                                                {{Form::token() }}
                                                <button type="submit" class="btn btn-warning"><i
                                                            class="fa fa-trash"></i></button>
                                                {!! Form::Close() !!}
                                                @if($category->status == 'DESACTIVE')
                                                    <a href="{{ route('active', $category->id) }}" class="btn btn-danger"><i class="fa fa-check"></i></a>
                                                @else
                                                    <a href="{{ route('desactive', $category->id) }}" class="btn btn-primary"><i class="fa fa-remove"></i></a>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            {!! Form::open(['method' => 'POST','route' => ['categories.store'],'enctype' => 'multipart/form-data']) !!}
            {{ csrf_field() }}
            <div class="col-md-6">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" class="form-control" id="name"
                               placeholder="Nombre">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option value="ACTIVE">Activa</option>
                            <option value="DESACTIVE">Desactiva</option>
                        </select>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Agregar Categoría</button>
                </div>
            </div>
            {!! Form::Close() !!}
        </div>
    </section>
@endsection