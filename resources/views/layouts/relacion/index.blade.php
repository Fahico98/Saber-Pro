@extends('template.template')

@section('contenido')
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{asset('/')}}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Relacion Icfes</li>
  </ol>
</nav>


<div class="container-fluid">
  <div class="row">
    <div class="col-xl-4">
      <a type="button" href="{{asset('/relacion/create')}}" class="btn btn-primary">
        Agregar Nuevo
      </a>
    </div>
    <div class="col-xl-8">
      <form class="searchbox" action="#!">
          <a href="#!" class="searchbox-toggle"> <i class="fas fa-arrow-left"></i> </a>

          <input type="text" class="searchbox-input" placeholder="type to search">
            <button type="submit" class="searchbox-submit"> <i class="fas fa-search"></i> </button>
      </form>
    </div>
  </div>
</div>

@endsection
