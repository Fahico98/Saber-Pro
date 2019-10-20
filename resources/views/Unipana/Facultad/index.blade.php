<div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default ">
        <div class="panel-heading">Facultades</div>
        <div class="panel-body">
            <div>
                <a href="{{asset('unipana/facultad/create')}}" class="btn btn-info">
                    <span class="glyphicon glyphicon-plus"></span> Agregar
                </a>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr >
                        <th>ID</th>
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($facultad as $facultad)
                    <tr>
                        <td>{{ $facultad->id }}</td>
                        <td>{{ $facultad->name }}</td>
                        <td>
                            <a href="{{asset('unipana/facultad/'.$facultad->id.'/editar')}}" class="btn btn-warning">
                                <span class="glyphicon glyphicon-wrench"></span>
                            </a>
                            <a href="{{asset('unipana/'.$facultad->id.'/destroy')}}" class="btn btn-danger">
                                <span class="glyphicon glyphicon-trash"></span>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
