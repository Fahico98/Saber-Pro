
<div class="form-group">
	<div class="form-group">
        <label for="" class="control-label">Modulo</label>
        <select class="form-control" id="modulo" name="modulo_id">

            @isset($modulo_selected_name)
                <option value="selected">-- Seleccionar --</option>
                @foreach($modulos as $modulo)
                    <option value="{{ $modulo->id }}" {{ ($modulo->name === $modulo_selected_name ? "selected" : "") }}>
                        {{ $modulo->name }}
                    </option>
                @endforeach
            @endisset

            @empty($modulo_selected_name)
                <option value="selected" selected>-- Seleccionar --</option>
                @foreach($modulos as $modulo)
                    <option value="{{ $modulo->id }}">{{ $modulo->name }}</option>
                @endforeach
            @endempty

        </select>
        <label for="" class="control-label">Afirmación</label>

        @isset($afirmacion_selected_name)
            <select class="form-control" id="afirmacion" name="afirmacion_id">
                <option value="selected">-- Seleccionar --</option>
                @foreach($afirmaciones as $afirmacion)
                    <option value="{{ $afirmacion->id }}" {{ ($afirmacion->name === $afirmacion_selected_name ? "selected" : "") }}>
                        {{ $afirmacion->name }}
                    </option>
                @endforeach
            </select>
        @endisset

        @empty($afirmacion_selected_name)
            <select class="form-control" id="afirmacion" name="afirmacion_id" disabled>
                <option value="selected" selected>-- Seleccionar --</option>
            </select>
        @endempty

        <label for="" class="negrita">Evidencia</label>
        <input class="form-control" value="{{ $evidencia->name }}" required="required" name="name" type="text">
	</div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <button class="btn btn-default" type="reset">Cancelar</button>
</div>

<script src="{{ asset('js/createEvidencia.js') }}" defer></script>
