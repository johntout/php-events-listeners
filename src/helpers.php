<?php

if (!function_exists('event'))
{
    function event($event)
    {
        (new \App\EventsService())->dispatch($event);
    }
}
