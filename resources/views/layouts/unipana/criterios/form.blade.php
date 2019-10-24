
<div class="form-group">
    <label for="" class="negrita">Nombre Criterios de evaluacion</label>
    <div>
        <input class="form-control" value="{{ $criterio->name}}" required="required" name="name" type="text">
    </div>
	<div class="form-group">
        <label for="" class="control-label">Resultado de aprendizaje</label>
        <select class="form-control"  name="result_id">
            @foreach($resultados as $resultado){}
                <option value="{{$resultado->id}}" "{{($criterio->resultado_aprendizaje_id==$resultado->id)?"selected":""}}">
                    {{$resultado->name}}
                </option>
            @endforeach;
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <button class="btn btn-default" type="reset">Cancelar </button>
</div>
