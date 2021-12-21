<?php

namespace App\CoreContext\Application\Query;

use App\ddd\CQRS\Query\Query;

class FindUserByApiTokenQuery implements Query
{
    private string $apiToken;

    public function __construct(string $apiToken)
    {
        $this->apiToken = $apiToken;
    }

    /**
     * @return string
     */
    public function getApiToken(): string
    {
        return $this->apiToken;
    }
}