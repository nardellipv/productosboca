@section('style')
    <link rel="stylesheet" href="{{ asset('styleAdmin/plugins/datatables/dataTables.bootstrap.css') }}">
@endsection

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Listado de productos</h3>
        </div>
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Oferta</th>
                    <th>Sección</th>
                    <th>Categoría</th>
                    <th>Ranting</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>${{ $product->price }}</td>
                    <td>${{ $product->offer }}</td>
                    <td>{{ $product->section }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->rating }}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>

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