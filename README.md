# php-events-listeners
An example for how to implement event-listeners functionality to your app based on the idea of Laravel's event-listeners.

## Requirements
PHP 7

## How it start
Clone the repository and run `composer dumpautoload`

## How it works
You can register your events and listeners on the private property $listen in `EventsService` class or in the `boot` method
using a closure function with an event as argument.

Register using private property $listen:
```php
private static $listen = [
    'App\Events\LogoutEvent' => [
        'App\Listeners\LogoutListener'
    ]
];
```

Register using closure functions in boot method:
```php
$eventService->listen(function(LoginEvent $event) {
    $event->user->loggedIn = true;
});
```

After you have registered the events you can trigger them using the helper function `events` in helpers.php
```php
event(new \App\Events\LogoutEvent($user));
```