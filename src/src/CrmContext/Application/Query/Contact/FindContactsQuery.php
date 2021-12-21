<?php

namespace App\CrmContext\Application\Query\Contact;

use App\ddd\CQRS\Query\Query;

class FindContactsQuery implements Query
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