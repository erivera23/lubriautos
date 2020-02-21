@extends('layouts.app')

@section('content')
<div class="container">
@if(Session::has('Mensaje'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('Mensaje')}}
    </div>
@endif
<a href="{{ url('productos/create') }}" class="btn btn-success">Agregar producto</a>
<br><br>
<table class="table table-light table-hover">
    <thead class="thead-light ">
        <tr>
            <th>#</th>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($productos as $producto)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$producto->codigo}}</td>
            <td>{{$producto->nombre}}</td>
            <td>{{$producto->descripcion}}</td>
            <td>
            <a href="{{ url('/productos/'.$producto->id.'/edit') }}" class="btn btn-warning">Editar</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

{{ $productos->links() }}
</div>

@endsection