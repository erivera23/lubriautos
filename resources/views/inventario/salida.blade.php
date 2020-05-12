@extends('layouts.app')

@section('content')
<div class="container">
<h1>Salida de productos</h1>
<form action="{{ url('inventario/salida/'.$producto->id) }}" method="post">
    {{csrf_field() }}
    @include('inventario.form', ['Modo'=>'salida'])
</form>

</div>

@endsection