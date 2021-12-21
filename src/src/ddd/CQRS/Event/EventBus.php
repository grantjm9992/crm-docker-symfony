<?php

namespace App\ddd\CQRS\Event;

interface EventBus
{
    public function dispatch(Event $command): void;
}