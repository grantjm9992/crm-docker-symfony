<?php

namespace App\CoreContext\Infrastructure\Domain;

use App\CoreContext\Domain\Model\Company;
use App\CoreContext\Domain\Model\CompanyApplication;
use App\CoreContext\Domain\Model\CompanyApplicationRepository;
use App\ddd\Infrastructure\Domain\AbstractDoctrineRepository;
use Doctrine\Persistence\ManagerRegistry;

class CompanyApplicationDoctrineRepository extends AbstractDoctrineRepository implements CompanyApplicationRepository
{
    public function __construct(ManagerRegistry $registry, string $entityClass = CompanyApplication::class)
    {
        parent::__construct($registry, $entityClass);
    }

    public function save(CompanyApplication $application): void
    {
        $this->_em->persist($application);
    }

    public function byId(string $id): ?CompanyApplication
    {
        return $this->find($id);
    }

    public function byCompanyId(string $companyId): array
    {
        return $this->queryBuilderList('companyApplication', $companyId)
            ->andWhere('companyApplication.uninstalledOn IS NULL')
            ->getQuery()
            ->getResult();
    }

    public function byCompanyIdAndApplicationId(string $companyId, string $applicationId): ?CompanyApplication
    {
        return $this->queryBuilderList('companyApplication', $companyId)
            ->andWhere('companyApplication.applicationId = :applicationId')
            ->setParameter('applicationId', $applicationId)
            ->getQuery()
            ->getResult();
    }
}