<div class="box">
        <div class="box-header">
            <h3 class="box-title">Listado de usuarios</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>email</th>
                    <th>Provincia</th>
                    <th>Teléfono</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->state }}</td>
                    <td>{{ $user->phone }}</td>
                </tr>
                @endforeach
            </table>
        </div>
        <!-- /.box-body -->
    </div>