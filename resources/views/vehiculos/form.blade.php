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

    <input type="hidden" class="form-control" id="idCliente" name="idCliente" value="{{ isset($cliente->id)?$cliente->id:old('id')}}">
</div>

<!-- Form -->
<div class="form-group">
<label for="rtn" class="control-label">{{'Tipo'}}</label>
<input type="text" id="rtn" name='rtn' class="form-control" value='{{ isset($vehiculo->tipo)?$vehiculo->tipo:old("tipo")}}'>
</div>

<div class="form-group">
<label for="empresa" class="control-label">{{'Descripcion'}}</label>
<input type="text" id="empresa" name='empresa' class="form-control" value='{{ isset($cliente->descripcion)?$cliente->descripcion:old("descripcion")}}'>
</div>

<div class="form-group">
<label for="representante" class="control-label ">{{'Placa'}}</label>
<input type="text" id="" name='representante' class="form-control {{$errors->has('placa')?'is-invalid':''}}" value='{{ isset($cliente->placa)?$cliente->placa:old("placa")}}'>
{!! $errors->first('representante','<div class="invalid-feedback">El nombre es requerido</div>') !!}
</div>

<div class="form-group">
<label for="celular" class="control-label">{{'Año'}}</label>
<input type="text" id="celular" name='celular' class="form-control" value='{{ isset($cliente->anio)?$cliente->anio:old("anio")}}'>
</div>

<input type="submit" class="btn btn-success" value="{{$Modo=='crear' ? 'Agregar':'Actualizar'}}">
<a href="{{ url('vehiculos') }}" class="btn btn-primary">Regresar</a>
</div>
