<?php

namespace App\ddd\CQRS\Event;

use Symfony\Component\Messenger\MessageBusInterface;

class MessengerEventBus
{
    private MessageBusInterface $commandBus;

    public function __construct(MessageBusInterface $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    public function dispatch(Event $command): void
    {
        $this->commandBus->dispatch($command);
    }
}