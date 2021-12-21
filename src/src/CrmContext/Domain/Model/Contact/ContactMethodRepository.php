<?php

namespace App\CrmContext\Domain\Model\Contact;

interface ContactMethodRepository
{
    public function save(ContactMethod $contactMethod): void;

    public function byId(string $id): ?ContactMethod;

    public function byCompanyId(string $companyId): array;
}