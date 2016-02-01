@extends('app')

@section('content')



    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header adminFontTitulo">
                Anúncios Cadastrados
            </h1>

            <ol class="breadcrumbProduct">
                <li class="activeProduct">
                    <i class="fa fa-dashboard"></i> Painel administrativo > Anúncios cadastrados
                </li>
            </ol>

        </div>

    </div>
    <table class="table table-action">

        <thead>
        <tr>
            <th class="t-small"></th>
            <th class="t-small">ID</th>
            <th class="t-small">Imagem</th>
            <th class="t-medium">Título</th>
            <th class="t-medium">Data</th>
            <th class="t-small">Situação</th>
            <th class="t-small">Opções</th>
        </tr>
        </thead>

        <tbody>
        @foreach($adverts as $advert)
            <tr>
                <td class="vertical-middle"><label><input type="checkbox"></label></td>
                <td class="vertical-middle">{{$advert->id}}</td>
                <td>
                    @if(count($advert->images))
                        <img width="80" height="80" src="{{url('gallery/'.$advert->images()->first()->extension)}}"/>
                    @else
                        <img src="{{url('images/no-img.jpg')}}" alt="" width="80" height="80" />
                    @endif
                </td>
                <td class="vertical-middle">{{$advert->anuncio_titulo}}</td>
                <td class="vertical-middle">{{ date("d/m/Y H:i:s", strtotime($advert->created_at)) }}</td>
                <td class="t-status t-active vertical-middle">@if($advert->status == 1)Ativo @else Inativo @endif</td>
                <td  width="5%" class="text-center vertical-middle">
                    <div class="dropdown">
                        <a href="javascript:;" class="btn btn-xs btn-primary" data-toggle="dropdown"><i class="fa fa-plus"></i></a>
                        <ul class="dropdown-menu pull-right">
                            <li>
                                <a href="{{route('admin.anuncios.edit',['id'=>$advert->id])}}"><i class="fa fa-fw fa-gear"></i>Editar</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a id="changeStatus"class="remover" value="{{$advert->id}}" href=""><i class="fa fa-power-off"></i> @if($advert->status == 1) Desativar @else  Ativar @endif</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a class="fechar" href="javascript:void(0)"><i class="fa fa-fw fa-times"></i>Fechar</a>
                            </li>
                        </ul>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!!$adverts->render()  !!}
@endsection