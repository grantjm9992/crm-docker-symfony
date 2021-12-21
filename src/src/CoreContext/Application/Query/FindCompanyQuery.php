<?php

namespace App\CoreContext\Application\Query;

use App\ddd\CQRS\Query\Query;

class FindCompanyQuery implements Query
{
    private string $id;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
}