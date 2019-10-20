@extends('template.template')

@section('contenido')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{asset('/')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{asset('/unipana/resultado')}}">Resultados de aprendizaje</a></li>
    <li class="breadcrumb-item active" aria-current="page">Actualizar</li>
  </ol>
</nav>

<div class="card-body ">
  <div class="card spur-card">
      <div class="card-header">
          <div class="spur-card-icon">
              <i class="fas fa-chart-bar"></i>
          </div>
          <div class="spur-card-title"> Editar Resultado de aprendizaje </div>
      </div>
      <div class="card-body ">
        <form action="{{url('/unipana/resultado/'.$resultado->id)}}" class="form" method="POST">
            {{ csrf_field() }}
            @include('layouts.unipana.resultados.form')
        </form>






      </div>
    </div>
  </div>
@endsection
