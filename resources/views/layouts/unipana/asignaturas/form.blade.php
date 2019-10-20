<div class="form-group">
		<label for="" class="negrita">Nombre Asignatura</label>
		<div>
			<input class="form-control" value="{{ $asignatura->name}}" required="required" name="name" type="text">

    </div>

    <label for="" class="negrita">Semestre</label>
		<div>
			<input class="form-control" value="{{ $asignatura->semestre}}" required="required" name="semestre" type="text">

    </div>

    <label for="" class="negrita">No Creditos</label>
		<div>
			<input class="form-control" value="{{ $asignatura->no_creditos}}" required="required" name="no_creditos" type="text">

    </div>

    <label for="" class="negrita">Docente encargado</label>
		<div>
			<input class="form-control" value="{{ $asignatura->docente_encargado}}" required="required" name="docente_encargado" type="text">

    </div>

	<div class="form-group">

    <label for="" class="control-label">Programa</label>
    <select class="form-control"  name="programa_id">
        @foreach($programas as $programa){}
        <option value="{{$programa->id}}" "{{($asignatura->programa_id==$programa->id)?"selected":""}}"> {{ $programa->name }}</option>
        @endforeach;



    </select>


</div>

<button type="submit" class="btn btn-primary">Submit</button>
<button class="btn btn-default" type="reset">Cancelar </button>
