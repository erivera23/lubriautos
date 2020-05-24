@empty($cliente)
<a class="btn btn-primary" href="{{ url('/clientes-busqueda') }}">
  Buscar Cliente
</a>
@endempty



<div class="form-group">
@if($cliente->empresarial??'' == '1')
    <label for="representante" class="control-label">{{'Empresa'}}</label>
    <input type="text" readonly id="representante" name='representante' class="form-control" value='{{ isset($cliente->empresa)?$cliente->empresa:old("representante")}}'>
@else
    <label for="representante" class="control-label">{{'Cliente'}}</label>
    <input type="text" readonly id="representante" name='representante' class="form-control" value='{{ isset($cliente->representante)?$cliente->representante:old("representante")}}'>
@endif

    <input type="hidden" class="form-control" id="cliente_id" name="cliente_id" value="{{ isset($cliente->id)?$cliente->id:old('id')}}">
</div>

<!-- Form -->
<div class="form-group">
<label for="tipo" class="control-label">{{'Tipo'}}</label>
<input type="text" id="tipo" name='tipo' class="form-control" value='{{ isset($vehiculo->tipo)?$vehiculo->tipo:old("tipo")}}'>
</div>

<div class="form-group">
<label for="descripcion" class="control-label">{{'Descripcion'}}</label>
<input type="text" id="descipcion" name='descripcion' class="form-control" value='{{ isset($vehiculo->descripcion)?$vehiculo->descripcion:old("descripcion")}}'>
</div>

<div class="form-group">
<label for="placa" class="control-label ">{{'Placa'}}</label>
<input type="text" id="placa" name='placa' class="form-control {{$errors->has('placa')?'is-invalid':''}}" value='{{ isset($vehiculo->placa)?$vehiculo->placa:old("placa")}}'>
{!! $errors->first('representante','<div class="invalid-feedback">El nombre es requerido</div>') !!}
</div>

<div class="form-group">
<label for="anio" class="control-label">{{'Año'}}</label>
<input type="text" id="anio" name='anio' class="form-control" value='{{ isset($vehiculo->anio)?$vehiculo->anio:old("anio")}}'>
</div>

<input type="submit" class="btn btn-success" value="{{$Modo=='crear' ? 'Agregar':'Actualizar'}}">
<a href="{{ url('vehiculos') }}" class="btn btn-primary">Regresar</a>
</div>
