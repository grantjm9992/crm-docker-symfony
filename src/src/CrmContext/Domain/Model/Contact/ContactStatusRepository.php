<?php

namespace App\CrmContext\Domain\Model\Contact;

interface   ContactStatusRepository
{
    public function save(ContactStatus $contactStatus): void;

    public function byId(string $id): ?ContactStatus;

    public function byCompanyId(string $companyId): array;
}