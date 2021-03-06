@extends('layouts.app')

@section('content')

<div class="container">
<h2>Crear vehiculo</h2>
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

    <form action="{{url('/vehiculos')}}" method="post" class="form-horizontal">
        {{csrf_field() }}
        <br>
        @include('vehiculos.form', ['Modo'=>'crear'])
        
    </form>
</div>
@endsection