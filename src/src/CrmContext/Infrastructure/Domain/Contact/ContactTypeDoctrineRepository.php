<?php

namespace App\CrmContext\Infrastructure\Domain\Contact;

use App\ddd\Infrastructure\Domain\AbstractDoctrineRepository;
use App\CrmContext\Domain\Model\Contact\ContactType;
use App\CrmContext\Domain\Model\Contact\ContactTypeRepository;
use Doctrine\Persistence\ManagerRegistry;

class ContactTypeDoctrineRepository extends AbstractDoctrineRepository implements ContactTypeRepository
{
    public function __construct(ManagerRegistry $registry, string $entityClass = ContactType::class)
    {
        parent::__construct($registry, $entityClass);
    }

    public function save(ContactType $contactType): void
    {
        $this->_em->persist($contactType);
    }

    public function byId(string $id): ?ContactType
    {
        return $this->find($id);
    }

    public function byCompanyId(string $companyId): array
    {
        return $this->queryBuilderList('contactType', $companyId)
            ->getQuery()
            ->getResult();
    }
}