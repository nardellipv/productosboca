@extends('layouts.admin')
@section('style')
    <link rel="stylesheet" href="{{ asset('styleAdmin/plugins/datatables/dataTables.bootstrap.css') }}">
@endsection

@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Listado de productos</h3>
        <a href="{{ route('products.create') }}" type="submit" class="btn btn-info pull-right">Crear producto</a>
    </div>
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Oferta</th>
                <th>Sección</th>
                <th>Categoría</th>
                <th>Ranting</th>
                <th>Acción</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ str_limit($product->description,50) }}</td>
                    <td>${{ $product->price }}</td>
                    <td>${{ $product->offer }}</td>
                    <td>{{ $product->section }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->rating }}</td>
                    <td>
                        <div class="btn-group">
                            <div class="btn-group">
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                {!! Form::open(['method' => 'DELETE','route' => ['products.destroy', $product->id],'style'=>'display:inline']) !!}
                                {{Form::token() }}
                                <button type="submit" class="btn btn-warning"><i class="fa fa-trash"></i></button>
                                {!! Form::Close() !!}
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection

@section('script')
    <script src="{{ asset('styleAdmin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('styleAdmin/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    <script>
        $(function () {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });
    </script>
@endsection