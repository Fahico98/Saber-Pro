@extends('template.template')

@section('contenido')


<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{asset('/')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{asset('/unipana/facultad')}}">facultades</a></li>
    <li class="breadcrumb-item active" aria-current="page">Actualizar</li>
  </ol>
</nav>

<div class="card-body ">
  <div class="card spur-card">
      <div class="card-header">
          <div class="spur-card-icon">
              <i class="fas fa-chart-bar"></i>
          </div>
          <div class="spur-card-title"> Actualizar Facultad </div>
      </div>
      <div class="card-body ">
        <form action="{{ url('/unipana/facultad/'.$facultad->id)}}" class="form" method="POST">
            {{ csrf_field() }}
            @include('layouts.unipana.facultades.form')
        </form>
      </div>
  </div>
</div>
@endsection


<!--
<form  method="post" action="{{ url('/unipana/facultad/'.$facultad->id)}}">
	@csrf
<div class="form-group">
		<label for="name_facultad" class="negrita">Nombre facultad:</label>
		<div>
			<input class="form-control" placeholder="Ingenieria" required="required" name="name" type="text" value="{{$facultad->name}}" >
		</div>
	</div>
<button type="submit" class="btn btn-info" value="enviar">Guardar</button>
</form> -->
