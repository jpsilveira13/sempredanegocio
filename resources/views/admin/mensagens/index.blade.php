@extends('app')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header adminFontTitulo">
                Anúncios Cadastrados
            </h1>

            <ol class="breadcrumbProduct">
                <li class="activeProduct">
                    <i class="fa fa-dashboard"></i> Painel administrativo > Mensagens enviadas
                </li>
            </ol>

        </div>

    </div>
    @if(count($messages) > 0 )
        <table class="table table-action">

            <thead>
            <tr>
                <th class="t-small"></th>
                <th class="t-small">ID</th>
                <th class="t-small">URL</th>
                <th class="t-medium">Email</th>
                <th class="t-medium">Data</th>

                <th class="t-small">Opções</th>
            </tr>
            </thead>

            <tbody>
            @foreach($messages as $message)
                <tr>
                    <td class="vertical-middle"><label><input type="checkbox"></label></td>
                    <td class="vertical-middle">{{$message->id}}</td>
                    <td>{{$message->url_site}}</td>
                    <td class="vertical-middle">{{$message->email}}</td>
                    <td class="vertical-middle">{{ date("d/m/Y H:i:s", strtotime($message->created_at)) }}</td>
                    <td  width="5%" class="text-center vertical-middle">
                        <div class="dropdown">
                            <a href="javascript:;" class="btn btn-xs btn-primary" data-toggle="dropdown"><i class="fa fa-plus"></i></a>
                            <ul class="dropdown-menu pull-right">
                                <li>
                                    <a href="{{route('admin.mensagens.edit',['id'=>$message->id])}}"><i class="fa fa-fw fa-gear"></i>Editar</a>
                                </li>
                                <li class="divider"></li>

                                <li class="divider"></li>
                                <li>
                                    <a target="_blank" href="{{url('/anuncio')}}/{{$message->url_site}}"><i class="fa fa-eye"></i> Ver anúncio</a>
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
        {!!$messages->render()  !!}
    @else
        <h1>Não há registro de mensagens salvas.</h1>
    @endif
@endsection