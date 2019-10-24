
@foreach($asignaturas as $asignatura)
    <h3>{{ $asignatura->nombre_asignatura}}</h3>
    @break
@endforeach
<h3>Resultado aprendezaje<br></h3>
<div>
    @foreach($asignaturas as $asignatura)
        <p>{{$asignatura->resultado}}</p>
        <h3>Criterio evaluacion<br></h3>
        <div>
            @foreach($asignaturas as $asignatura)
                <p>{{$asignatura->criterio}}</p>
            @endforeach
        </div>
    @endforeach
    <button type="submit" class="btn btn-primary">Submit</button>
    <button class="btn btn-default" type="reset">Cancelar</button>
</div>

