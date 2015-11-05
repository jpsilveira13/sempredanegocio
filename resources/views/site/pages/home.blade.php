@extends('site.layout')
@section('menu-area')
@endsection
@section('categories')
    @include('site.pages.categorias_home')
@stop
@section('content')
    <div class="col-md-9">
        <div class="well well-sm">
            <strong>Exibir como </strong>
            <div class="btn-group">
                <a href="#" id="list" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th-list">
                 </span>Lista</a> <a href="#" id="grid" class="btn btn-default btn-sm"><span
                            class="glyphicon glyphicon-th"></span>Grade</a>
            </div>
        </div>
        <div id="products" class="row list-group">
            @for($i = 0;$i<10;$i++)
                <div class="item  col-xs-6 col-lg-4 bloco-item">
                    <div class="thumbnail">
                        <img class="group list-group-image" src="http://placehold.it/400x250/000/fff" alt="" />
                        <div class="caption">
                            <h4 class="group inner list-group-item-heading">Product title</h4>
                            <p class="group inner list-group-item-text">
                                Product description... Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                                sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <p class="lead">$21.000</p>
                                </div>
                                <div class="col-xs-12 col-md-6">
                                    <a class="btn btn-success" href="{{asset('imoveis/1/teste')}}">Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endfor

        </div>
    </div>
@endsection