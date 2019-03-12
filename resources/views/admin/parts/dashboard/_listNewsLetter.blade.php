<div class="box">
    <div class="box-header">
        <h3 class="box-title">Listado de usuarios</h3>
    </div>
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>email</th>
            </tr>
            </thead>
            <tbody>
            @foreach($newsLetters as $newsLetter)
                <tr>
                    <td>{{ $newsLetter->name }}</td>
                    <td>{{ $newsLetter->email }}</td>
                </tr>
            @endforeach
        </table>
    </div>
</div>