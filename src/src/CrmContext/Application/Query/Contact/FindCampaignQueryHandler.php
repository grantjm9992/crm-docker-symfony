<?php

namespace App\CrmContext\Application\Query\Contact;

use App\CrmContext\Application\ViewFactory\Contact\CampaignViewFactory;
use App\CrmContext\Domain\Model\Contact\CampaignRepository;
use App\CrmContext\Domain\ViewModel\Contact\CampaignView;
use App\ddd\CQRS\Query\QueryHandler;
use Doctrine\ORM\EntityNotFoundException;

class FindCampaignQueryHandler implements QueryHandler
{
    private CampaignRepository $campaignRepository;

    public function __construct(CampaignRepository $campaignRepository)
    {
        $this->campaignRepository = $campaignRepository;
    }

    public function __invoke(FindCampaignQuery $query): CampaignView
    {
        $campaign = $this->campaignRepository->byId($query->getId());
        if ($campaign === null) {
            throw new EntityNotFoundException();
        }

        return CampaignViewFactory::create($campaign);
    }
}