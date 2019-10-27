
<div class="form-group">
    <label for="" class="negrita">Nombre Resultado de aprendizaje</label>
    <div>
        <input class="form-control" value="{{ $resultado->name }}" required="required" name="name" type="text">
	</div>
	<div class="form-group">
        <label for="" class="control-label">Asignatura</label>
        <select class="form-control"  name="asignatura_id">
            @foreach($asignaturas as $asignatura){}
                <option value="{{ $asignatura->id }}" {{ ($resultado->asignatura_id == $asignatura->id) ? "selected" : "" }}>
                    {{ $asignatura->name }}
                </option>
            @endforeach;
        </select>
	</div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <button class="btn btn-default" type="reset">Cancelar </button>
</div>


