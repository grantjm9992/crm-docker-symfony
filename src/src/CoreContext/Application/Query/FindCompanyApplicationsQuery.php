<?php

namespace App\CoreContext\Application\Query;

use App\ddd\CQRS\Query\Query;

class FindCompanyApplicationsQuery implements Query
{
    private string $companyId;

    public function __construct(string $companyId)
    {
        $this->companyId = $companyId;
    }

    /**
     * @return string
     */
    public function getCompanyId(): string
    {
        return $this->companyId;
    }
}