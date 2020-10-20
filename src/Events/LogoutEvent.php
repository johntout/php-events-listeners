<?php

namespace App\Events;

class LogoutEvent
{
    /*
     * UserEntity $user
     */
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