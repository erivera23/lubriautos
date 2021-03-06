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
            <th>Nombre</th>
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
            <td>{{$cliente->celular}}</td>
            <td>{{$cliente->correo}}</td>
            <td>
            <a href="{{ url('/vehiculos/create/'.$cliente->id) }}" class="btn btn-warning">Seleccionar</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

{{ $clientes ?? '' ->links() }}
</div>

@endsection