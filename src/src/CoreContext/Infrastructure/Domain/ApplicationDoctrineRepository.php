<?php

namespace App\CoreContext\Infrastructure\Domain;

use App\CoreContext\Domain\Model\Application;
use App\CoreContext\Domain\Model\ApplicationRepository;
use App\CoreContext\Domain\Model\Company;
use App\ddd\Infrastructure\Domain\AbstractDoctrineRepository;
use Doctrine\Persistence\ManagerRegistry;

class ApplicationDoctrineRepository extends AbstractDoctrineRepository implements ApplicationRepository
{
    public function __construct(ManagerRegistry $registry, string $entityClass = Application::class)
    {
        parent::__construct($registry, $entityClass);
    }

    public function save(Application $application): void
    {
        $this->_em->persist($application);
    }

    public function byId(string $id): ?Application
    {
        return $this->find($id);
    }

    public function byKey(string $key): ?Application
    {
        return $this->createQueryBuilder('application')
            ->andWhere('application.key = :key')
            ->setParameter('key', $key)
            ->getQuery()
            ->getOneOrNullResult();
    }
}