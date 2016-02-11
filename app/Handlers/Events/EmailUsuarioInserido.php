<?php

namespace sempredanegocio\Handlers\Events;


use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use sempredanegocio\Events\UsuarioInserido;

class EmailUsuarioInserido
{
    /**
     * Create the event handler.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  AnuncioInserido  $event
     * @return void
     */
    public function handle(UsuarioInserido $event)
    {
        $dataSend = [
            'id'	=> $event->getUser()->id,
            'name'	=> $event->getUser()->name,
            'email'	=> $event->getUser()->email
        ];

        \Mail::send('emails.welcomeUser', $dataSend, function($message) use ($dataSend)
        {
            $message->from('naoresponder@sempredanegocio.com.br', 'Sempre da Negócio');
            $message->subject('Confirmação de Cadastro');
            $message->to($dataSend['email']);

        });

    }
}
