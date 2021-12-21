<?php

namespace App\CrmContext\Domain\Model\Contact;

interface ContactInterestRepository
{
    public function save(ContactInterest $contactInterest): void;

    public function byId(string $id): ?ContactInterest;

    public function byCompanyId(string $companyId): array;
}