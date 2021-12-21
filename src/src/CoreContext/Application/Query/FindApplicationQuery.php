<?php

namespace App\CoreContext\Application\Query;

use App\ddd\CQRS\Query\Query;

class FindApplicationQuery implements Query
{
    private string $key;

    public function __construct(string $key)
    {
        $this->key = $key;
    }

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }
}