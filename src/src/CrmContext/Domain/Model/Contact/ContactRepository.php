<?php

namespace App\CrmContext\Domain\Model\Contact;

interface ContactRepository
{
    public function save(Contact $contact): void;

    public function byId(string $id): ?Contact;

    public function byCompanyId(string $companyId): array;
}