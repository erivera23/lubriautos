@extends('layouts.app')

@section('content')
<div class="container">
<h1>Crear un producto</h1>

<form action="{{url('/productos')}}" method="post" class="form-horizontal">
    {{csrf_field() }}
    <br>
    @include('productos.form', ['Modo'=>'crear'])
    
</form>
</div>

@endsection