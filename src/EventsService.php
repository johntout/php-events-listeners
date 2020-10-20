<?php

namespace App;

use App\Events\LoginEvent;

class EventsService
{
    /**
     * @var array
     */
    private static $listen = [
        'App\Events\LogoutEvent' => [
            'App\Listeners\LogoutListener'
        ]
    ];

    public static function boot()
    {
        $eventService = new self();

        // Here you can add manually events
        // with callback functions
        // e.g. $event->listen(function($event) {});
        $eventService->listen(function(LoginEvent $event) {
            $event->user->last_visit_date = date('Y-m-d');
        });

        return $eventService;
    }

    /**
     * @param $callback
     * @throws \ReflectionException
     */
    public function listen($callback)
    {
        $reflection = new \ReflectionFunction($callback);
        $event = $reflection->getParameters()[0]->getType()->getName();

        self::$listen[$event] = $callback;
    }

    /**
     * @param $eventToDispatch
     * @throws \Exception
     */
    public function dispatch($eventToDispatch)
    {
        $dispatchedEventClass = get_class($eventToDispatch);

        foreach (self::$listen as $event => $listeners) {
            if ($dispatchedEventClass === $event) {
                if (is_callable($listeners)) {
                    call_user_func($listeners, $eventToDispatch);
                }
                else if (is_array($listeners)) {
                    foreach (array_unique($listeners) as $listener) {
                        (new $listener)->handle($eventToDispatch);
                    }
                }
            }
        }
    }
}