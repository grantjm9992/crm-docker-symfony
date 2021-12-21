<?php

namespace App\ddd\CQRS\Command;

interface CommandBus
{
    public function dispatch(Command $command): void;
}