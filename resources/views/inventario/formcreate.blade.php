<div class="form-group">
<label for="nombre" class="control-label">{{'Nombre'}}</label>
<input type="text" disabled id="nombre" name='nombre' class="form-control inline-block" value='{{ isset($producto->nombre)?$producto->nombre:old("nombre")}}'>
</div>

<div class="form-group">
<label for="codigo" class="control-label">{{'Codigo'}}</label>
<input type="text" disabled id="codigo" name='codigo' class="form-control" value='{{ isset($producto->codigo)?$producto->codigo:old("codigo")}}'>
</div>

<div class="form-group">
<label for="descripcion" class="control-label ">{{'Descripcion'}}</label>
<input type="text" disabled id="descripcion" name='descripcion' class="form-control {{$errors->has('descripcion')?'is-invalid':''}}" value='{{ isset($producto->descripcion)?$producto->descripcion:old("descripcion")}}'>
{!! $errors->first('descripcion','<div class="invalid-feedback">La descripción es requerido</div>') !!}
</div>

<div class="form-group">
    <label for="cantidad" class="control-label">{{'Cantidad'}}</label>
    <input type="number" id="cantidad" class="form-control {{$errors->has('cantidad')?'is-invalid':''}}" name='cantidad' value='{{ isset($producto->cantidad)?$producto->cantidad:old("cantidad")}}'>
    {!! $errors->first('cantidad','<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
    <label for="concepto" class="control-label">{{'Concepto'}}</label>
    <input type="text" class="form-control" name="concepto" value="{{ isset($producto->concepto)?$producto->concepto:old('concepto') }}">
</div>

<div class="form-group">
    <label for="referencia" class="control-label">{{'# Referencia'}}</label>
    <input type="text" class="form-control" name="referencia" id="referencia" value="{{ isset($producto->referencia)?$producto->referencia:old('referencia') }}">
</div>

<div class="form-group">
    <label for="fecha"></label>
    <input type="date" class="form-control" name="fecha">
</div>

<input type="hidden" id="tipo" name="tipo" value="1">
<input type="hidden" id="producto_id" name="producto_id" value="{{ isset($producto->id)?$producto->id:old('producto_id') }}">

<input type="submit" class="btn btn-success" value="Registrar entrada">
<a href="{{ url('producto') }}" class="btn btn-primary">Regresar</a>