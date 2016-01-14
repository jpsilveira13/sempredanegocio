@extends('site.layout')

@section('content')
    resultado do numero = {{$resultado->count()}} <br /><br /><br />
    @foreach($resultado as $resultados)

        {{$resultados->id}}
    @endforeach
@endsection