<?php

namespace App\CrmContext\Infrastructure\Domain\Contact;

use App\CrmContext\Domain\Model\Contact\Campaign;
use App\CrmContext\Domain\Model\Contact\ContactInterest;
use App\CrmContext\Domain\Model\Contact\ContactInterestRepository;
use App\ddd\Infrastructure\Domain\AbstractDoctrineRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ContactInterestDoctrineRepository extends AbstractDoctrineRepository implements ContactInterestRepository
{
    public function __construct(ManagerRegistry $registry, string $entityClass = ContactInterest::class)
    {
        parent::__construct($registry, $entityClass);
    }

    public function save(ContactInterest $contactInterest): void
    {
        $this->_em->persist($contactInterest);
    }

    public function byId(string $id): ?ContactInterest
    {
        return $this->find($id);
    }

    public function byCompanyId(string $companyId): array
    {
        return $this->queryBuilderList('contactInterest', $companyId)
            ->getQuery()
            ->getResult();
    }
}