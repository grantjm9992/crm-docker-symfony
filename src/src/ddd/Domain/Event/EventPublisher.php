<?php

namespace App\ddd\Domain\Event;

use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Contracts\EventDispatcher\Event;

class EventPublisher
{
    public static function publishEvent(Event $event, string $eventName): void
    {
        $dispatcher = new EventDispatcher();
        $dispatcher->dispatch($event, $eventName);
    }
}