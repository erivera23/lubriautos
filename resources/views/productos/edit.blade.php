@extends('layouts.app')

@section('content')
<div class="container">
<h1>Actualizar producto</h1>

<form action="{{url('/productos/'.$producto->id)}}" method="post" class="form-horizontal">
    {{csrf_field() }}
    {{method_field('PATCH')}}
    <br>
    @include('productos.form', ['Modo'=>'actualizar'])
    
</form>
</div>

@endsection