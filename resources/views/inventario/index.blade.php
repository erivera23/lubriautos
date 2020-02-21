@extends('layouts.app')

@section('content')
<div class="container">
@if(Session::has('Mensaje'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('Mensaje')}}
    </div>
@endif
<a href="{{ url('inventario/create') }}" class="btn btn-success">Agregar producto</a>
<br><br>
<table class="table table-light table-hover">
    <thead class="thead-light ">
        <tr>
            <th>#</th>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Existencia</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($inventario as $producto)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$producto->codigo}}</td>
            <td>{{$producto->nombre}}</td>
            <td>{{$producto->descripcion}}</td>
            <td>{{$producto->cantidad}}</td>
            <td>
            <a href="{{ url('/inventario/'.$producto->id.'/edit') }}" class="btn btn-warning">Editar</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

{{ $inventario->links() }}
</div>

@endsection