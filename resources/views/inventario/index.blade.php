@extends('layouts.app')

@section('content')
<div class="container">
@if(Session::has('Mensaje'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('Mensaje')}}
    </div>
@endif

<div class="row pb-2">
    <div class="col-md-6">
        <h1>Inventario de productos</h1>
    </div>
    <div class="col-md-3">
    <a href="{{ url('pdf/')}}" target="_blank" class="btn btn-primary float-right" >
            PDF
        </a>
    </div>
    <div class="col-md-3">
        <form>
            <input name="search" id="search" class="form-control" placeholder="Buscar...">
        </form>
    </div>
</div>

@if($query)
    <div class="alert alert-primary" role="alert">
        Tus resultados para la búsqueda de '{{$query}}' son:
    </div>
@endif

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
            <td>{{$producto->existencia}}</td>
            <td>
            <a href="{{ url('/inventario/'.$producto->producto_id.'/entrada') }}" class="btn btn-primary">+</a>
            <a href="{{ url('inventario/'.$producto->producto_id.'/salida') }}" class="btn btn-danger">-</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

{{ $inventario->links() }}
</div>

@endsection