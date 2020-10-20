<?php

namespace App\Listeners;

use App\Events\LoginEvent;

class LoginListener
{
    public function handle(LoginEvent $event)
    {
        $event->user->loggedIn = true;
    }
}