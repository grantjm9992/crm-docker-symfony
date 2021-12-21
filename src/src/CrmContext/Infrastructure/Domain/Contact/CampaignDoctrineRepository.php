<?php

namespace App\CrmContext\Infrastructure\Domain\Contact;

use App\CrmContext\Domain\Model\Contact\Campaign;
use App\CrmContext\Domain\Model\Contact\CampaignRepository;
use App\ddd\Infrastructure\Domain\AbstractDoctrineRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class CampaignDoctrineRepository extends AbstractDoctrineRepository implements CampaignRepository
{
    public function __construct(ManagerRegistry $registry, string $entityClass = Campaign::class)
    {
        parent::__construct($registry, $entityClass);
    }

    public function save(Campaign $campaign): void
    {
        $this->_em->persist($campaign);
    }

    public function byId(string $id): ?Campaign
    {
        return $this->find($id);
    }

    public function byCompanyId(string $companyId): array
    {
        return $this->queryBuilderList('campaign', $companyId)
            ->getQuery()
            ->getResult();
    }
}