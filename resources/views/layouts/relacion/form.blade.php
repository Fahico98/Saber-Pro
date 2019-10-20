@foreach ($asignaturas as $asignatura)
<h3>{{$asignatura->nombre_asignatura}}</h3>
@endforeach


  <h3> Resultado aprendeizaje </h3>

   <div>
    @foreach ($asignaturas as $asignatura)
     <p>{{$asignatura->resultado}}</p>
      <h3> criterio evaluacion </h3>

      <div>
       @foreach ($asignaturas as $asignatura)
        <p>{{$asignatura->criterio}}</p>
       @endforeach
      </div>

    @endforeach
   </div>

  




</div>



<button type="submit" class="btn btn-primary">Submit</button>
<button class="btn btn-default" type="reset">Cancelar </button>
