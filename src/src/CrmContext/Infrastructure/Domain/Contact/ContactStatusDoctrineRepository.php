<?php

namespace App\CrmContext\Infrastructure\Domain\Contact;

use App\CrmContext\Domain\Model\Contact\Campaign;
use App\CrmContext\Domain\Model\Contact\ContactStatus;
use App\CrmContext\Domain\Model\Contact\ContactStatusRepository;
use App\ddd\Infrastructure\Domain\AbstractDoctrineRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ContactStatusDoctrineRepository extends AbstractDoctrineRepository implements ContactStatusRepository
{
    public function __construct(ManagerRegistry $registry, string $entityClass = ContactStatus::class)
    {
        parent::__construct($registry, $entityClass);
    }

    public function save(ContactStatus $contactStatus): void
    {
        $this->_em->persist($contactStatus);
    }

    public function byId(string $id): ?ContactStatus
    {
        return $this->find($id);
    }

    public function byCompanyId(string $companyId): array
    {
        return $this->queryBuilderList('contactStatus', $companyId)
            ->getQuery()
            ->getResult();
    }
}