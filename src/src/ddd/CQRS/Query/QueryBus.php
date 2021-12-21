<?php

namespace App\ddd\CQRS\Query;

interface QueryBus
{
    public function handle(Query $query);
}