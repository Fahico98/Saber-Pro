
<div class="form-group">
	<div class="form-group">
        <label for="" class="control-label">Asignaturas</label>
        <select class="form-control"  id="asignatura" name="asignatura_id">
            <option value="selected" selected>-- Seleccionar --</option>
            @foreach($asignaturas as $asignatura)
                <option value="{{ $asignatura->id }}">{{ $asignatura->name }}</option>
            @endforeach
        </select>
        <label for="" class="control-label">Resultados de aprendizaje</label>
        <select class="form-control" id="resultado" name="resultado_id" disabled>
            <option value="selected" selected>-- Seleccionar --</option>
        </select>
        <label for="" class="negrita">Criterios de evaluacion</label>
        <input class="form-control" value="{{ $criterio->name }}" required="required" name="name" type="text">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <button class="btn btn-default" type="reset">Cancelar </button>
</div>

<script src="{{ asset('js/createCriterio.js') }}" defer></script>
