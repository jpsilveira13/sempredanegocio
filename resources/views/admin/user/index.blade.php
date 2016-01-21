@extends('app')

@section('content')



    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header adminFontTitulo">
                Usuários Cadastrados
            </h1>

            <ol class="breadcrumbProduct">
                <li class="activeProduct">
                    <i class="fa fa-dashboard"></i> Painel administrativo > Usuários cadastrados
                </li>
            </ol>

        </div>

    </div>
    <table class="table table-action">

        <thead>
        <tr>
            <th class="t-small"></th>
            <th class="t-small">ID</th>
            <th class="t-small">Image</th>
            <th class="t-medium">Nome</th>
            <th class="t-medium">Data</th>
            <th class="t-small">Situação</th>
            <th class="t-small">Opções</th>
        </tr>
        </thead>

        <tbody>
        @foreach($users as $user)
            <tr>
                <td><label><input type="checkbox"></label></td>
                <td>{{$user->id}}</td>
                <td>
                    @if(count($user->avatar))
                        <img width="80" height="80" style="background-image:{{$user->avatar}} "/>
                    @else
                        <img src="{{url('images/no-img.jpg')}}" alt="" width="80" height="80" />"
                    @endif
                </td>
                <td>{{$user->name}}</td>
                <td>{{ date("d/m/Y H:i:s", strtotime($user->created_at)) }}</td>
                <td class="t-status t-active">Ativo</td>
                <td  width="5%" class="text-center">
                    <div class="dropdown">
                        <a href="javascript:;" class="btn btn-xs btn-primary" data-toggle="dropdown"><i class="fa fa-plus"></i></a>
                        <ul class="dropdown-menu pull-right">
                            <li>
                                <a href=""><i class="fa fa-fw fa-gear"></i>Visualizar/Editar</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href=""><i class="fa fa-camera-retro"></i> Cadastrar\Visualizar</a>
                            </li>

                            <li class="divider"></li>
                            <li>
                                <a class="remover" href=""><i class="fa fa-trash-o"></i> Remover Produto</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a class="fechar" href="javascript:void(0)"><i class="fa fa-fw fa-power-off"></i> Fechar</a>
                            </li>
                        </ul>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!!$users->render()  !!}
@endsection