@extends('template.template')

@section('contenido')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{asset('/')}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Asignaturas</li>
    </ol>
</nav>

<div class="container-fluid">
    <div class="row">
        @isAdminOrDIE
            <div class="col-xl-4">
                <a type="button" href="{{asset('/unipana/asignatura/create')}}" class="btn btn-primary">
                    Agregar Nuevo
                </a>
            </div>
        @endisAdminOrDIE
        <div class="col-xl-8">
            <form class="searchbox" action="{{ asset('/unipana/asignatura') }}">
                <a href="#!" class="searchbox-toggle"><i class="fas fa-arrow-left"></i></a>
                <input type="text" class="searchbox-input" placeholder="type to search" id="searchBox" name="searchBox"
                    value="{{ $searchBox }}"></input>
                <button type="submit" class="searchbox-submit"><i class="fas fa-search"></i></button>
            </form>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="card spur-card">
                <div class="card-header">
                    <div class="spur-card-icon">
                        <i class="fas fa-table"></i>
                    </div>
                    <div class="spur-card-title">Asignatura</div>
                </div>
                <div class="card-body card-body-with-dark-table">
                    <table class="table table-dark table-in-card">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Semestre</th>
                                <th scope="col">No Creditos</th>
                                <th scope="col">Docente encargado</th>
                                <th scope="col">Programa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($asignaturas as $asignatura)
                                <tr>
                                    <td>{{ $asignatura->id }}</td>
                                    <td>{{ $asignatura->name }}</td>
                                    <td>{{ $asignatura->semestre }}</td>
                                    <td>{{ $asignatura->no_creditos }}</td>
                                    <td>{{ $asignatura->docente_encargado }}</td>
                                    <td>{{ $asignatura->programa->name }}</td>
                                    <div id="tableContent" name="tableContent">
                                        @isvisitante
                                            <td>
                                                <a href="{{ asset('/relacion/' . $asignatura->id . '/list')}}"
                                                    class="btn btn-primary btn-lg mb-1"><i class="fas fa-list-alt"></i></a>
                                            </td>
                                        @endisvisitante
                                        @isDIE
                                            <td>
                                                <a href="{{asset('/relacion/' . $asignatura->id . '/crear')}}"
                                                    class="btn btn-primary btn-lg mb-1"><i class="fas fa-list-alt"></i></a>
                                                <a href="{{asset('/unipana/asignatura/'.$asignatura->id.'/editar')}}"
                                                    class="btn btn-secondary btn-lg mb-1"><i class="fas fa-edit"></i></a>
                                            </td>
                                        @endisDIE
                                        @isadmin
                                            <td>
                                                <a href="{{asset('/relacion/' . $asignatura->id . '/crear')}}"
                                                    class="btn btn-primary btn-lg mb-1"><i class="fas fa-list-alt"></i></a>
                                                <a href="{{asset('/unipana/asignatura/'.$asignatura->id.'/editar')}}"
                                                    class="btn btn-secondary btn-lg mb-1"><i class="fas fa-edit"></i></a>
                                                <a href="{{asset('/unipana/asignatura/' . $asignatura->id . '/destroy')}}"
                                                    onclick="return confirm('Seguro que desea eliminar el registro?')"
                                                    class="btn btn-danger btn-lg mb-1"><i class="fas fa-times-circle"></i></a>
                                            </td>
                                        @endisadmin
                                    </div>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="text-center">
                {{ $asignaturas->links() }}
            </div>
        </div>
    </div>
</div>

@endsection
