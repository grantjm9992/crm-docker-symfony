<?php

namespace App\CrmContext\Application\Query\Contact;

use App\ddd\CQRS\Query\Query;

class FindContactTypeQuery implements Query
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