
@extends('template.template')

@section('contenido')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ asset('/') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Relacion</li>
    </ol>
</nav>

<div class="card-body">
    <div class="card spur-card">
        <div class="card-header">
            <div class="spur-card-icon">
                <i class="fas fa-chart-bar"></i>
            </div>
            <div class="spur-card-title">{{ $relacionData[0]["asignatura"] }}</div>
        </div>
        <div class="card-body">
            @foreach($relacionData as $data)
                <div class="card">
                    <div class="card-body">
                        <p class="m-0"><label class="text-primary">Resultado de aprendizaje:</label> {{ $data["resultado"] }}</p>
                        <p class="m-0"><label class="text-primary">Criterio de evaluación:</label> {{ $data["criterio"] }}</p>
                        <p class="m-0"><label class="text-primary">Evidencia:</label> {{ $data["evidencia"] }}</p>
                        <p class="m-0"><label class="text-primary">Afirmación:</label> {{ $data["afirmacion"] }}</p>
                        <p class="m-0"><label class="text-primary">Modulo ICFES:</label> {{ $data["modulo"] }}</p>
                    </div>
                </div>
            @endforeach
            <a href={{ asset("/informe_pdf/" . $id[0]) }} class="btn btn-primary mt-4">Generar informe (PDF)</a>
        </div>
    </div>
</div>

@endsection
