<div class="form-group">
<label for="nombre" class="control-label">{{'Nombre'}}</label>
<input type="text" id="nombre" name='nombre' class="form-control" value='{{ isset($producto->nombre)?$producto->nombre:old("nombre")}}'>
</div>

<div class="form-group">
<label for="codigo" class="control-label">{{'Codigo'}}</label>
<input type="text" id="codigo" name='codigo' class="form-control {{$errors->has('descripcion')?'is-invalid':''}}" value='{{ isset($producto->codigo)?$producto->codigo:old("codigo")}}'>
{!! $errors->first('codigo','<div class="invalid-feedback">El código es requerido</div>') !!}
</div>

<div class="form-group">
<label for="descripcion" class="control-label ">{{'Descripcion'}}</label>
<input type="text" id="descripcion" name='descripcion' class="form-control {{$errors->has('descripcion')?'is-invalid':''}}" value='{{ isset($producto->descripcion)?$producto->descripcion:old("descripcion")}}'>
{!! $errors->first('descripcion','<div class="invalid-feedback">La descripción es requerido</div>') !!}
</div>

<div class="form-group">
    <label for="costo" class="control-label">{{'Costo'}}</label>
    <input type="number" step="0.01" id="costo" name="costo" class="form-control {{$errors->has('costo')?'is-invalid':''}}" value='{{ isset($producto->costo)?$producto->costo:old("costo")}}'>
    {!! $errors->first('costo','<div class="invalid-feedback">El costo es requerido</div>') !!}
</div>

<div class="form-group">
    <label for="precio" class="control-label">{{'Precio de venta'}}</label>
    <input type="number" step="0.01" id="precio" name="precio" class="form-control {{$errors->has('precio')?'is-invalid':''}}" value='{{ isset($producto->precio)?$producto->precio:old("precio")}}'>
    {!! $errors->first('precio','<div class="invalid-feedback">El precio de venta es requerido</div>') !!}
</div>

<div class="form-group">
    <label for="existencia" class="control-label">{{'Existencia inicial'}}</label>
    <input type="number" value="0" id="existencia" name="existencia" class="form-control " >
</div>

<input type="submit" class="btn btn-success" value="{{$Modo=='crear' ? 'Agregar':'Actualizar'}}">
<a href="{{ url('productos') }}" class="btn btn-primary">Regresar</a>