<?php

namespace App\Listeners;

use App\Events\LogoutEvent;

class LogoutListener
{
    public function handle(LogoutEvent $event)
    {
        unset($event->user->last_visit_date);
    }
}