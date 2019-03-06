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
                        {!! Form::open(['method' => 'POST','route' => ['coupon.store']]) !!}
                        {{ csrf_field() }}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="coupon">Cupón</label>
                                <input type="text" name="coupon" class="form-control" id="coupon"
                                       placeholder="Cupón">
                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="discount">Descuento</label>
                                        <input type="text" name="discount" class="form-control" id="discount"
                                               placeholder="Descuento">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Estado</label>
                                        <select class="form-control" name="status">
                                            <option value="ACTIVE">Activo</option>
                                            <option value="DESACTIVE">Desactivo</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Agregar Cupón</button>
                        </div>
                        {!! Form::Close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

@section('style')
    <link rel="stylesheet" href="{{ asset('styleAdmin/plugins/datatables/dataTables.bootstrap.css') }}">
@endsection

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Listado de compras</h3>
    </div>
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Cupón</th>
                <th>Descuento</th>
                <th>Estado</th>
                <th>Acción</th>
            </tr>
            </thead>
            <tbody>
            @foreach($cuopons as $cuopon)
                <tr>
                    <td>{{ $cuopon->coupon }}</td>
                    <td>{{ $cuopon->discount }}</td>
                    <td>{{ $cuopon->status }}</td>
                    <td>
                        <div class="btn-group">
                            <div class="btn-group">
                                {!! Form::open(['method' => 'DELETE','route' => ['coupon.destroy', $cuopon->id],'style'=>'display:inline']) !!}
                                {{Form::token() }}
                                <button type="submit" class="btn btn-warning"><i
                                            class="fa fa-trash"></i></button>
                                {!! Form::Close() !!}
                                @if($cuopon->status == 'DESACTIVE')
                                    <a href="{{ route('cuopon.active', $cuopon->id) }}" class="btn btn-danger"><i class="fa fa-check"></i></a>
                                @else
                                    <a href="{{ route('cuopon.desactive', $cuopon->id) }}" class="btn btn-primary"><i class="fa fa-remove"></i></a>
                                @endif
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