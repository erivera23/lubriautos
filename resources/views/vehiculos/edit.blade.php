@extends('layouts.app')

@section('content')
<h2>Editar vehiculo</h2>

<div class="container">
    @if(count($errors)>0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error)
                <li>
                    {{$error}}
                </li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{url('/vehiculos/'.$vehiculo->id)}}" method="post" class="form-horizontal">
        {{csrf_field() }}
        {{method_field('PATCH')}}
        <br>
        @include('vehiculos.form', ['Modo'=>'editar'])
        
    </form>
</div>
@endsection