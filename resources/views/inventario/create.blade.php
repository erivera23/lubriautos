@extends('layouts.app')

@section('content')
<div class="container">
Crear un producto

<form action="{{url('/inventario')}}" method="post" class="form-horizontal">
    {{csrf_field() }}
    <br>
    @include('inventario.form', ['Modo'=>'crear'])
    
</form>
</div>

@endsection