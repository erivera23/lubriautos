@extends('layouts.app')

@section('content')
<div class="container">
<h1>Entrada de productos</h1>
<form action="{{ url('inventario/entrada/'.$producto->id) }}" method="post">
    {{csrf_field() }}
    @include('inventario.form', ['Modo'=>'entrada'])
</form>

</div>
@endsection