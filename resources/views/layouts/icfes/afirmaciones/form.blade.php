<div class="form-group">
    <label for="" class="negrita">Nombre afirmacion</label>
    <div>
        <input class="form-control" value="{{ $afirmacion->name}}" required="required" name="name" type="text">
	</div>
	<div class="form-group">
        <label for="" class="control-label">Modulo</label>
        <select class="form-control"  name="modulo_id">
            @foreach($modulos as $modulo){}
                <option value="{{$modulo->id}}" "{{($afirmacion->modulo_id==$modulo->id)?"selected":""}}">
                    {{$modulo->name}}
                </option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <button class="btn btn-default" type="reset">Cancelar </button>
</div>
