<?php

namespace App\Events;

class LoginEvent
{
    public $user;

    /**
     * LogoutEvent constructor.
     * @param \stdClass $user
     */
    public function __construct(\stdClass $user)
    {
        $this->user = $user;
    }
}