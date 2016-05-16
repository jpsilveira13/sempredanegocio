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
                <td class="vertical-middle"><label><input type="checkbox"></label></td>
                <td class="vertical-middle">{{$user->id}}</td>
                <td>
                    @if($user->social == 'Facebook')
                        <img width="80" height="80" class="background-style" style="background-image:url('{{$user->avatar}}') "/>
                    @else
                        <img src="{{url('images/no-img.jpg')}}" alt="" width="80" height="80" />
                    @endif
                </td>
                <td class="vertical-middle">{{$user->name}}</td>
                <td class="vertical-middle">{{ date("d/m/Y H:i:s", strtotime($user->created_at)) }}</td>
                @if($user->status == 1)
                    <td class="t-status t-active vertical-middle">Ativo</td>
                @else
                    <td class="t-status t-inactive vertical-middle">Inativo</td>
                @endif
                <td  width="5%" class="text-center vertical-middle">
                    <div class="dropdown">
                        <a href="javascript:;" class="btn btn-xs btn-primary" data-toggle="dropdown"><i class="fa fa-plus"></i></a>
                        <ul id="" class="dropdown-menu pull-right">
                            <li>
                                <a href=""><i class="fa fa-fw fa-gear"></i>Visualizar</a>
                            </li>

                            <li class="divider"></li>
                            <li>
                                <a id="changeStatus"class="remover" value="{{$user->id}}" href=""><i class="fa fa-power-off"></i> @if($user->status == 1) Desativar @else  Ativar @endif</a>
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
    {!!$users->render()  !!}
@endsection