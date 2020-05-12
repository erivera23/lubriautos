
<div class="form-group">
<label for="rtn" class="control-label">{{'RTN'}}</label>
<input type="text" id="rtn" name='rtn' class="form-control" value='{{ isset($cliente->rtn)?$cliente->rtn:old("rtn")}}'>
</div>

<div class="form-group">
<label for="empresa" class="control-label">{{'Empresa'}}</label>
<input type="text" id="empresa" name='empresa' class="form-control" value='{{ isset($cliente->empresa)?$cliente->empresa:old("empresa")}}'>
</div>

<div class="form-group">
<label for="representante" class="control-label ">{{'Representante'}}</label>
<input type="text" id="representante" name='representante' class="form-control {{$errors->has('representante')?'is-invalid':''}}" value='{{ isset($cliente->representante)?$cliente->representante:old("representante")}}'>
{!! $errors->first('representante','<div class="invalid-feedback">El nombre es requerido</div>') !!}
</div>

<div class="form-group">
<label for="celular" class="control-label">{{'Celular'}}</label>
<input type="text" id="celular" name='celular' class="form-control" value='{{ isset($cliente->celular)?$cliente->celular:old("celular")}}'>
</div>

<div class="form-group">
<label for="Correo" class="control-label">{{'Correo'}}</label>
<input type="text" id="Correo" class="form-control" name='Correo' value='{{ isset($cliente->correo)?$cliente->correo:old("correo")}}'>
</div>

<div class="form-group">
<label for="empresarial" class="control-label">{{'Es una empresa?'}}</label>
<select id="empresarial" class="form-control" name="empresarial">
        @if($cliente->empresarial??'' == '1')
            <option value="1" selected="true" >Si</option>
            <option value="0">No</option>
        @else
            <option value="1" >Si</option>
            <option value="0" selected="true">No</option>
        @endif
</select>
</div>


<input type="submit" class="btn btn-success" value="{{$Modo=='crear' ? 'Agregar':'Actualizar'}}">
<a href="{{ url('clientes') }}" class="btn btn-primary">Regresar</a>