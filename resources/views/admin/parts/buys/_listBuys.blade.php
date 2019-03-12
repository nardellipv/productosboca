@extends('layouts.admin')

@section('style')
    <link rel="stylesheet" href="{{ asset('styleAdmin/plugins/datatables/dataTables.bootstrap.css') }}">
@endsection

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Listado de compras</h3>
        </div>
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>email</th>
                    <th>Dirección</th>
                    <th>Provincia</th>
                    <th>Localidad</th>
                    <th>CP</th>
                    <th>Teléfono</th>
                    <th>Nota</th>
                    <th>Pago</th>
                    <th>Estado</th>
                </tr>
                </thead>
                <tbody>
                @foreach($buys as $buy)
                    <tr>
                        <td>
                            <button type="button" class="btn btn-link" data-toggle="modal"
                                    data-target="#compra-{{ $buy->id }}">{{ $buy->chName }} {{ $buy->lastname }}</button>
                        </td>
                        <td>{{ $buy->email }}</td>
                        <td>{{ $buy->address }}</td>
                        <td>{{ $buy->state }}</td>
                        <td>{{ $buy->city }}</td>
                        <td>{{ $buy->postalcode }}</td>
                        <td>{{ $buy->phone }}</td>
                        <td>{{ $buy->note }}</td>
                        <td>{{ $buy->payment }}</td>
                        <td>{{ $buy->status }}</td>
                    </tr>
                @include('admin.parts.buys._modal')
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