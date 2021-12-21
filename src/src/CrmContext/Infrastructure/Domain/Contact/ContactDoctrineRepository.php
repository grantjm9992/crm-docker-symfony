<?php

namespace App\CrmContext\Infrastructure\Domain\Contact;

use App\CrmContext\Domain\Model\Contact\Contact;
use App\CrmContext\Domain\Model\Contact\ContactRepository;
use App\ddd\Infrastructure\Domain\AbstractDoctrineRepository;
use Doctrine\Persistence\ManagerRegistry;

class ContactDoctrineRepository extends AbstractDoctrineRepository implements ContactRepository
{
    public function __construct(ManagerRegistry $registry, string $entityClass = Contact::class)
    {
        parent::__construct($registry, $entityClass);
    }

    public function save(Contact $contact): void
    {
        $this->_em->persist($contact);
    }

    public function byId(string $id): ?Contact
    {
        return $this->find($id);
    }

    public function byCompanyId(string $companyId): array
    {
        return $this->queryBuilderList('contact', $companyId)
            ->getQuery()
            ->getResult();
    }
}