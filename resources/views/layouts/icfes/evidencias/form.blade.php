
<div class="form-group">
	<div class="form-group">
        <label for="" class="control-label">Modulo</label>
        <select class="form-control" id="modulo" name="modulo_id">
            <option value="selected" selected>-- Seleccionar --</option>
            @foreach($modulos as $modulo)
                <option value="{{$modulo->id}}">
                    {{ $modulo->name }}
                </option>
            @endforeach;
        </select>
        <label for="" class="control-label">Afirmación</label>
        <select class="form-control" id="afirmacion" name="afirmacion_id" disabled>
            <option value="selected" selected>-- Seleccionar --</option>
        </select>
        <label for="" class="negrita">Evidencia</label>
        <input class="form-control" value="{{ $evidencia->name }}" required="required" name="name" type="text">
	</div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <button class="btn btn-default" type="reset">Cancelar</button>
</div>

<script src="{{ asset('js/createEvidencia.js') }}" defer></script>
