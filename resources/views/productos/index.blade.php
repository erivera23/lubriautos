@extends('layouts.app')

@section('content')
<div class="container">
@if(Session::has('Mensaje'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('Mensaje')}}
    </div>
@endif
<div class="row pb-2">
    <div class="col-md-3">
        <a href="{{ url('productos/create') }}" class="btn btn-success">Agregar producto</a>
    </div>

    <div class="col-md-3 offset-3">
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
            <th>Precio</th>
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
            <td>{{$producto->existencia}}</td>
            <td>{{$producto->precio}}
            <td>
            <a href="{{ url('/productos/'.$producto->id.'/edit') }}" class="btn btn-warning">Editar</a>
            <a href="{{url('/inventario/create/'.$producto->id)}}" class="btn btn-success">+</a>
            @if($producto->existencia > 0)
                <a href="{{ url('inventario/'.$producto->id.'/salida') }}" class="btn btn-danger">-</a>
            @endif
            
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

{{ $productos->links() }}
</div>

@endsection