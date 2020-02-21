<div class="form-group">
<label for="nombre" class="control-label">{{'Nombre'}}</label>
<input type="text" id="nombre" name='nombre' class="form-control" value='{{ isset($producto->nombre)?$producto->nombre:old("nombre")}}'>
</div>

<div class="form-group">
<label for="codigo" class="control-label">{{'Codigo'}}</label>
<input type="text" id="codigo" name='codigo' class="form-control" value='{{ isset($producto->codigo)?$producto->codigo:old("codigo")}}'>
</div>

<div class="form-group">
<label for="descripcion" class="control-label ">{{'Descripcion'}}</label>
<input type="text" id="descripcion" name='descripcion' class="form-control {{$errors->has('descripcion')?'is-invalid':''}}" value='{{ isset($producto->descripcion)?$producto->descripcion:old("descripcion")}}'>
{!! $errors->first('descripcion','<div class="invalid-feedback">La descripción es requerido</div>') !!}
</div>

<input type="submit" class="btn btn-success" value="{{$Modo=='crear' ? 'Agregar':'Actualizar'}}">
<a href="{{ url('productos') }}" class="btn btn-primary">Regresar</a>