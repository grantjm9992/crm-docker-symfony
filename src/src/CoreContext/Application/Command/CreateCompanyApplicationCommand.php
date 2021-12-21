<?php

namespace App\CoreContext\Application\Command;

use App\ddd\CQRS\Command\Command;

class CreateCompanyApplicationCommand implements Command
{
    private string $companyId;
    private string $applicationId;

    public function __construct(string $companyId, string $applicationId)
    {
        $this->companyId = $companyId;
        $this->applicationId = $applicationId;
    }

    /**
     * @return string
     */
    public function getCompanyId(): string
    {
        return $this->companyId;
    }

    /**
     * @return string
     */
    public function getApplicationId(): string
    {
        return $this->applicationId;
    }
}