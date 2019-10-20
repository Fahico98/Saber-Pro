<form  method="post" action="{{ url('/Unipana')}}">
	@csrf
<div class="form-group">
		<label for="name_asignatura" class="negrita">Nombre asignatura:</label>
		<div>
			<input class="form-control" placeholder="Base de datos" required="required" name="name_asignatura" type="text" id="name_asignatura" value="">
		</div>
	</div>

	<div class="form-group">
		<label for="semestre" class="negrita">Semestre:</label>
		<div>
			<input class="form-control" placeholder="1" required="required" name="semestre" type="text" id="semestre" value="">
		</div>
	</div>

	<div class="form-group">
		<label for="no_creditos" class="negrita">No creditos:</label>
		<div>
			<input class="form-control" placeholder="3" required="required" name="no_creditos" type="text" id="no_creditos" value="">
		</div>
	</div>

	<div class="form-group">
		<label for="docente_encargado" class="negrita">Docente encargado:</label>
		<div>
			<input class="form-control" placeholder="Pepito perez" required="required" name="docente_encargado" type="text" id="docente_encargado" value="">
		</div>
	</div>

	<div class="form-group">
		<label for="facultad_id" class="negrita">Facultad:</label>
		<div>
			<input class="form-control" placeholder="1" required="required" name="facultad_id" type="text" id="facultad_id" value="">
		</div>
	</div>

<button type="submit" class="btn btn-info" value="enviar">Guardar</button>
</form>
