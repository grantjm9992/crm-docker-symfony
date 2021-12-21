<?php

namespace App\CoreContext\Infrastructure\Domain;

use App\CoreContext\Domain\Model\Company;
use App\CoreContext\Domain\Model\CompanyRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class CompanyDoctrineRepository extends ServiceEntityRepository implements CompanyRepository
{
    public function __construct(ManagerRegistry $registry, string $entityClass = Company::class)
    {
        parent::__construct($registry, $entityClass);
    }

    public function byId(string $id): ?Company
    {
        return $this->find($id);
    }

    public function save(Company $company): void
    {
        $this->_em->persist($company);
    }
}