@extends('site.layout')

@section('content')
    <input id="pagamentoCampo" type="hidden" value="{{$code}}" />
    <div id="confirmaPagamento"></div>

@endsection