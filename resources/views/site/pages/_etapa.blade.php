<div class="process">
    <div class="process-row">
        <div class="process-step">
            <button type="button" class="btn btn-default btn-circle @if(Request::is('login')) active @elseif(Request::is('pagamento')) active @endif"><i class="fa fa-user fa-3x"></i></button>
            <p>Login | Registro</p>
        </div>
        <div class="process-step">
            <button type="button" class="btn btn-warning btn-circle @if(Request::is('anuncie')) active @elseif(Request::is('pagamento')) active @endif"><i class="fa fa-newspaper-o fa-3x"></i></button>
            <p>Faça seu anúncio</p>
        </div>
        <div class="process-step">
            <button type="button" class="btn btn-primary btn-circle @if(Request::is('pagamento')) active @endif"><i class="fa fa-credit-card fa-3x"></i></button>
            <p>Escolha seu plano</p>
        </div>
    </div>
</div>