<?php

namespace App\CrmContext\Application\Command\Contact;

use App\ddd\CQRS\Command\Command;

class CreateCampaignCommand implements Command
{
    private ?string $companyId;
    private string $name;

    public function __construct(
        ?string $companyId,
        string $name
    )
    {
        $this->companyId = $companyId;
        $this->name = $name;
    }

    /**
     * @return string|null
     */
    public function getCompanyId(): ?string
    {
        return $this->companyId;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}