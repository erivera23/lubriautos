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
        <a href="{{ url('clientes/create') }}" class="btn btn-success">Agregar cliente</a>
    </div>
    <div class="col-md-3 offset-6">
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
            <th>Representante</th>
            <th>RTN</th>
            <th>Empresa</th>
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
            <td>{{$cliente->celular}}</td>
            <td>{{$cliente->correo}}</td>
            <td>
                <a href="{{ url('/clientes/'.$cliente->id.'/edit') }}" class="btn btn-warning">Editar</a>
                <a href="{{url('/vehiculos-empresa/'.$cliente->id) }}" class="btn btn-primary">Vehi.</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

{{ $clientes ?? ''->links() }}
</div>

@endsection