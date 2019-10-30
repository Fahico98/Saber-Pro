@extends('template.template')

@section('contenido')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{asset('/')}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">facultades</li>
    </ol>
</nav>

<div class="container-fluid">
    <div class="row">
        @isAdminOrDIE
            <div class="col-xl-4">
                <a type="button" href="{{asset('/unipana/facultad/create')}}" class="btn btn-primary">
                    Agregar Nuevo
                </a>
            </div>
        @endisAdminOrDIE
        <div class="col-xl-8">
            <form class="searchbox" action="#!">
                <a href="#!" class="searchbox-toggle"> <i class="fas fa-arrow-left"></i></a>
                <input type="text" class="searchbox-input" placeholder="type to search">
                <button type="submit" class="searchbox-submit">
                    <i class="fas fa-search"></i>
                </button>
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
                    <div class="spur-card-title">Facultades</div>
                </div>
                <div class="card-body card-body-with-dark-table">
                    <table class="table table-dark table-in-card">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col"> </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($facultades as $facultad)
                                <tr>
                                    <td>{{ $facultad->id }}</td>
                                    <td>{{ $facultad->name }}</td>
                                    @isDIE
                                        <td>
                                            <a href="#" class="btn btn-primary btn-lg mb-1"> <i class="fas fa-list-alt"></i></a>
                                            <a href="{{asset('/unipana/facultad/'.$facultad->id.'/editar')}}"
                                                class="btn btn-secondary btn-lg mb-1"> <i class="fas fa-edit"></i></a>
                                        </td>
                                    @endisDIE
                                    @isadmin
                                        <td>
                                            <a href="#" class="btn btn-primary btn-lg mb-1"><i class="fas fa-list-alt"></i></a>
                                            <a href="{{asset('/unipana/facultad/'.$facultad->id.'/editar')}}"
                                                class="btn btn-secondary btn-lg mb-1"><i class="fas fa-edit"></i></a>
                                            <a href="{{asset('/unipana/facultad/'.$facultad->id.'/destroy')}}"
                                                onclick="return confirm('Seguro que desea eliminar el registro?')"
                                                class="btn btn-danger btn-lg mb-1"><i class="fas fa-times-circle"></i></a>
                                        </td>
                                    @endisadmin
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
