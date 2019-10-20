<div class="form-group">
		<label for="" class="negrita">Nombre evidencia</label>
		<div>
			<input class="form-control" value="{{$evidencia->name}}" required="required" name="name" type="text">


	</div>

	<div class="form-group">

    <label for="" class="control-label">Afirmacion</label>
    <select class="form-control"  name="afirmacion_id">
        @foreach($afirmaciones as $afirmacion){}
        <option value="{{$afirmacion->id}}" "{{($evidencia->afirmacion_id==$afirmacion->id)?"selected":""}}"> {{$afirmacion->name}}</option>
        @endforeach;



    </select>


</div>

<button type="submit" class="btn btn-primary">Submit</button>
<button class="btn btn-default" type="reset">Cancelar </button>
