@extends('layouts.app')

@section('content')
<h2>Editar cliente</h2>
<div class="container">

<form action="{{ url('/clientes/'.$cliente->id) }}" method="post">
    {{csrf_field() }}
    {{method_field('PATCH')}}
    @include('clientes.form', ['Modo'=>'editar'])
    
</form>
</div>
@endsection