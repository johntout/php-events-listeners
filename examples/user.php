<?php

require_once '../vendor/autoload.php';

$events = \App\EventsService::boot();
$user = new \stdClass();

print "<pre>";
print_r($user);
print "</pre>";

$user->name = 'Peter';
event(new \App\Events\LoginEvent($user));

print "<pre>";
print_r($user);
print "</pre>";

unset($user->name);
event(new \App\Events\LogoutEvent($user));

print "<pre>";
print_r($user);
print "</pre>";