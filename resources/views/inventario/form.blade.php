<div class="form-group">
<label for="nombre" class="control-label">{{'Nombre'}}</label>
<input type="text" id="nombre" name='nombre' class="form-control" value='{{ isset($inventario->nombre)?$inventario->nombre:old("nombre")}}'>
</div>

<div class="form-group">
<label for="codigo" class="control-label">{{'Codigo'}}</label>
<input type="text" id="codigo" name='codigo' class="form-control" value='{{ isset($inventario->codigo)?$inventario->codigo:old("codigo")}}'>
</div>

<div class="form-group">
<label for="descripcion" class="control-label ">{{'Descripcion'}}</label>
<input type="text" id="descripcion" name='descripcion' class="form-control {{$errors->has('descripcion')?'is-invalid':''}}" value='{{ isset($inventario->descripcion)?$inventario->descripcion:old("descripcion")}}'>
{!! $errors->first('descripcion','<div class="invalid-feedback">La descripción es requerido</div>') !!}
</div>

<div class="form-group">
<label for="cantidad" class="control-label">{{'Cantidad'}}</label>
<input type="number" id="cantidad" class="form-control {{$errors->has('cantidad')?'is-invalid':''}}" name='cantidad' value='{{ isset($inventario->cantidad)?$inventario->cantidad:old("cantidad")}}'>
{!! $errors->first('cantidad','<div class="invalid-feedback">:message</div>') !!}
</div>

<input type="hidden" id="tipo" name="tipo" value="{{$Modo=='crear' ? '1':'0'}}">

<input type="submit" class="btn btn-success" value="{{$Modo=='crear' ? 'Agregar':'Actualizar'}}">
<a href="{{ url('inventario') }}" class="btn btn-primary">Regresar</a>