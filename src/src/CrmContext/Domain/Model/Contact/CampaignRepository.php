<?php

namespace App\CrmContext\Domain\Model\Contact;

interface CampaignRepository
{
    public function save(Campaign $campaign): void;

    public function byId(string $id): ?Campaign;

    public function byCompanyId(string $companyId): array;
}