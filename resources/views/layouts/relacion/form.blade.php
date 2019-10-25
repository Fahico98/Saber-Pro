
<!--
@/foreach($asignaturas as $asignatura)
    <h3>{/{$asignatura->nombre_asignatura}}</h3>
    @/break
@/endforeach
<h3>Resultado aprendezaje<br></h3>
<div>
    @/foreach($asignaturas as $asignatura)
        <p>{/{$asignatura->resultado}}</p>
        <h3>Criterio evaluacion<br></h3>
        <div>
            @/foreach($asignaturas as $asignatura)
                <p>{/{$asignatura->criterio}}</p>
            @/endforeach
        </div>
    @/endforeach
    <button type="submit" class="btn btn-primary">Submit</button>
    <button class="btn btn-default" type="reset">Cancelar</button>
</div>
-->

<div>
    <h2>{{ $asignaturas[0]->nombre_asignatura }}</h2>
    <label for="resultado" class="mt-2">Resultado de aprendizaje</label>
    <select class="form-control" id="resultado"  name="resultado" required>
        <option value="selected" selected>-- Seleccionar --</option>
        @foreach($asignaturas as $asignatura){}
            <option value="{{ $asignatura->resultado_id }}">
                {{ $asignatura->resultado }}
            </option>
        @endforeach;
    </select>
    <label for="criterio" class="mt-3">Criterio de evaluación</label>
    <select class="form-control" id="criterio" name="criterio" disabled required>
        <option value="selected" selected>-- Seleccionar --</option>
    </select>
    <h2 class="mt-4">Parametros ICFES</h2>
    <label for="modulo" class="mt-2">Modulos ICFES</label>
    <select class="form-control" id="modulo"  name="modulo" required>
        <option value="selected" selected>-- Seleccionar --</option>
        @foreach($modulos as $modulo){}
            <option value="{{ $modulo->id }}">
                {{ $modulo->name }}
            </option>
        @endforeach;
    </select>
    <label for="afirmacion" class="mt-3">Afirmación</label>
    <select class="form-control" id="afirmacion" name="afirmacion" disabled required>
        <option value="selected" selected>-- Seleccionar --</option>
    </select>
    <label for="evidencia" class="mt-3">Evidencia</label>
    <select class="form-control" id="evidencia" name="evidencia" disabled required>
        <option value="selected" selected>-- Seleccionar --</option>
    </select>
    <div class="mt-4">
        <button type="submit" class="btn btn-primary">Definir relación</button>
        <button class="btn btn-default" type="reset">Cancelar </button>
    </div>
</div>
