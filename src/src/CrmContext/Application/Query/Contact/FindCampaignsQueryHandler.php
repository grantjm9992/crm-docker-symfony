<?php

namespace App\CrmContext\Application\Query\Contact;

use App\CrmContext\Application\ViewFactory\Contact\CampaignViewFactory;
use App\CrmContext\Domain\Model\Contact\CampaignRepository;
use App\ddd\CQRS\Query\QueryHandler;

class FindCampaignsQueryHandler implements QueryHandler
{
    private CampaignRepository $campaignRepository;

    public function __construct(CampaignRepository $campaignRepository)
    {
        $this->campaignRepository = $campaignRepository;
    }

    public function __invoke(FindCampaignsQuery $query): array
    {
        $campaigns = $this->campaignRepository->byCompanyId($query->getCompanyId());

        return CampaignViewFactory::createCollection($campaigns);
    }
}