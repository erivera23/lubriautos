@extends('layouts.app')

@section('content')

<div class="container">
@if(Session::has('Mensaje'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('Mensaje')}}
    </div>
@endif
<a href="{{ url('clientes/create') }}" class="btn btn-success">Agregar cliente</a>
<br><br>
<table class="table table-light table-hover">
    <thead class="thead-light ">
        <tr>
            <th>#</th>
            <th>Representante</th>
            <th>RTN</th>
            <th>Empresa</th>
            <th>Telefono fijo</th>
            <th>Celular</th>
            <th>Correo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($clientes as $cliente)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$cliente->representante}}</td>
            <td>{{$cliente->rtn}}</td>
            <td>{{$cliente->empresa}}</td>
            <td>{{$cliente->telefono}}</td>
            <td>{{$cliente->celular}}</td>
            <td>{{$cliente->correo}}</td>
            <td>
            <a href="{{ url('/clientes/'.$cliente->id.'/edit') }}" class="btn btn-warning">Editar</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

{{ $clientes->links() }}
</div>

@endsection