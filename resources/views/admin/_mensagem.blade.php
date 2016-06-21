<li class="dropdown">
    <a href="#" class="dropdown-toggle style-menu-header" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
    <ul class="dropdown-menu message-dropdown">
        @if($mensagens->count() > 0)
            @foreach($mensagens as $mensagem)
                <li class="message-preview">
                    <a href="#">
                        <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                            <div class="media-body">

                                <h5 class="media-heading"><strong></strong>
                                </h5>
                                <p class="small text-muted"><i class="fa fa-clock-o"></i>{{ date("d/m/Y H:i:s", strtotime($mensagem->created_at)) }}</p>
                                <p>{{str_limit($mensagem->mensagem,15)}}</p>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="message-footer">
                    <a href="#">Ver todas mensagens</a>
                </li>
            @endforeach

        @else
            <li class="message-footer">
                <a href="#">Não há mensagens cadastradas</a>
            </li>
        @endif
    </ul>
</li>