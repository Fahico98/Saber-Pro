
<div class="form-group">
    <label for="" class="negrita">Nombre programa</label>
    <div>
        <input class="form-control" value="{{ $programa->name}}" required="required" name="name" type="text">
    </div>
    <div class="form-group">
        <label for="" class="control-label">Facultad</label>
        <select class="form-control"  name="facultad_id">
            @foreach($facultades as $facultad){}
                <option value="{{$facultad->id}}" {{($programa->facultad_id == $facultad->id) ? "selected" : ""}}>
                    {{$facultad->name}}
                </option>
            @endforeach;
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <button class="btn btn-default" type="reset">Cancelar </button>
</div>
