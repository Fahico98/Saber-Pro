
<div class="form-group">
	<div class="form-group">
        <label for="" class="control-label">Asignaturas</label>
        <select class="form-control"  id="asignatura" name="asignatura_id">

            @isset($asignatura_selected_name)
                <option value="selected">-- Seleccionar --</option>
                @foreach($asignaturas as $asignatura)
                    <option value="{{ $asignatura->id }}" {{ ($asignatura->name === $asignatura_selected_name ? "selected" : "") }}>
                        {{ $asignatura->name }}
                    </option>
                @endforeach
            @endisset

            @empty($asignatura_selected_name)
                <option value="selected" selected>-- Seleccionar --</option>
                @foreach($asignaturas as $asignatura)
                    <option value="{{ $asignatura->id }}">{{ $asignatura->name }}</option>
                @endforeach
            @endempty

        </select>
        <label for="" class="control-label">Resultados de aprendizaje</label>

        @isset($resultado_selected_name)
            <select class="form-control" id="resultado" name="resultado_id">
                <option value="selected">-- Seleccionar --</option>
                @foreach($resultados as $resultado)
                    <option value="{{ $resultado->id }}" {{ ($resultado->name === $resultado_selected_name ? "selected" : "") }}>
                        {{ $resultado->name }}
                    </option>
                @endforeach
            </select>
        @endisset

        @empty($resultado_selected_name)
            <select class="form-control" id="resultado" name="resultado_id" disabled>
                <option value="selected" selected>-- Seleccionar --</option>
            </select>
        @endempty

        <label for="" class="negrita">Criterios de evaluacion</label>
        <input class="form-control" value="{{ $criterio->name }}" required="required" name="name" type="text">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <button class="btn btn-default" type="reset">Cancelar </button>
</div>

<script src="{{ asset('js/createCriterio.js') }}" defer></script>
