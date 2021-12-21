<?php

namespace App\CoreContext\Domain\Model;

interface CompanyApplicationRepository
{
    public function save(CompanyApplication $application): void;

    public function byId(string $id): ?CompanyApplication;

    /** @return CompanyApplication[] */
    public function byCompanyId(string $companyId): array;

    public function byCompanyIdAndApplicationId(string $companyId, string $applicationId): ?CompanyApplication;
}