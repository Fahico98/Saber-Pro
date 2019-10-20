<form  method="post" action="{{ url('/unipana/facultad/')}}">
	@csrf
<div class="form-group">
		<label for="name" class="negrita">Nombre facultad:</label>
		<div>
			<input class="form-control" placeholder="Ingenieria" required="required" name="name" type="text" id="name" >
		</div>
	</div>
<button type="submit" class="btn btn-info" value="enviar">Guardar</button>
</form>
