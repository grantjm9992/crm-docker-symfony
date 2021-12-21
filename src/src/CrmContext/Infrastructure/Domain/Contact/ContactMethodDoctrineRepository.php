<?php

namespace App\CrmContext\Infrastructure\Domain\Contact;

use App\CrmContext\Domain\Model\Contact\Campaign;
use App\CrmContext\Domain\Model\Contact\ContactMethod;
use App\CrmContext\Domain\Model\Contact\ContactMethodRepository;
use App\ddd\Infrastructure\Domain\AbstractDoctrineRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ContactMethodDoctrineRepository extends AbstractDoctrineRepository implements ContactMethodRepository
{
    public function __construct(ManagerRegistry $registry, string $entityClass = ContactMethod::class)
    {
        parent::__construct($registry, $entityClass);
    }

    public function save(ContactMethod $contactMethod): void
    {
        $this->_em->persist($contactMethod);
    }

    public function byId(string $id): ?ContactMethod
    {
        return $this->find($id);
    }

    public function byCompanyId(string $companyId): array
    {
        return $this->queryBuilderList('contactMethod', $companyId)
            ->getQuery()
            ->getResult();
    }
}