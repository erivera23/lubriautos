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
            <a href="{{ url('vehiculos/create') }}" class="btn btn-success">Agregar vehiculo</a>
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
                <th>Tipo</th>
                <th>Descripcion</th>
                <th>Placa</th>
                <th>Año</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($vehiculos as $vehiculo)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$vehiculo->representante}}</td>
                <td>{{$vehiculo->tipo}}</td>
                <td>{{$vehiculo->descripcion}}</td>
                <td>{{$vehiculo->placa}}</td>
                <td>{{$vehiculo->anio}}</td>
                <td>
                <a href="{{ url('/vehiculos/'.$vehiculo->id.'/edit') }}" class="btn btn-warning">Editar</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $vehiculos ?? ''->links() }}
</div>


@endsection