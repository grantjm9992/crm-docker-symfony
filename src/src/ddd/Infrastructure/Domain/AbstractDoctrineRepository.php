<?php

namespace App\ddd\Infrastructure\Domain;

use App\ddd\Domain\Model\AbstractRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

abstract class AbstractDoctrineRepository extends ServiceEntityRepository implements AbstractRepository
{
    // TODO - Add Pagination
    public function __construct(ManagerRegistry $registry, string $entityClass)
    {
        parent::__construct($registry, $entityClass);
    }

    public function queryBuilderList(string $alias, string $companyId): QueryBuilder
    {
        return $this->createQueryBuilder($alias)
            ->andWhere("$alias.companyId IS NULL OR $alias.companyId = :companyId")
            ->setParameter('companyId', $companyId);
    }

    public function all(string $alias): array
    {
        return $this->createQueryBuilder($alias)
            ->getQuery()
            ->getResult();
    }
}