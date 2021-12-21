<?php

namespace App\CrmContext\Domain\Model\Contact;

interface ContactTypeRepository
{
    public function save(ContactType $contactType): void;

    public function byId(string $id): ?ContactType;

    public function byCompanyId(string $companyId): array;
}