<?php

namespace sempredanegocio\Events;

use sempredanegocio\Models\User;
use sempredanegocio\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use sempredanegocio\Models\Advert;

class UsuarioInserido extends Event
{
    use SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */

    private $user ;

    public function __construct(User $user )
    {


        $this->user = $user;

    }


    public function getUser(){
        return $this->user;

    }


    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
