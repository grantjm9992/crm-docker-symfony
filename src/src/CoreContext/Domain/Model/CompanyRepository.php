<?php

namespace App\CoreContext\Domain\Model;

interface CompanyRepository
{
    public function byId(string $id): ?Company;

    public function save(Company $company): void;
}