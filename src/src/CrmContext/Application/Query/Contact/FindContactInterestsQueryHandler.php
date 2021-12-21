<?php

namespace App\CrmContext\Application\Query\Contact;

use App\CrmContext\Application\ViewFactory\Contact\CampaignViewFactory;
use App\CrmContext\Application\ViewFactory\Contact\ContactInterestViewFactory;
use App\CrmContext\Domain\Model\Contact\CampaignRepository;
use App\CrmContext\Domain\Model\Contact\ContactInterestRepository;
use App\ddd\CQRS\Query\QueryHandler;

class FindContactInterestsQueryHandler implements QueryHandler
{
    private ContactInterestRepository $contactInterestRepository;

    public function __construct(ContactInterestRepository $contactInterestRepository)
    {
        $this->contactInterestRepository = $contactInterestRepository;
    }

    public function __invoke(FindContactInterestsQuery $query): array
    {
        $campaigns = $this->contactInterestRepository->byCompanyId($query->getCompanyId());

        return ContactInterestViewFactory::createCollection($campaigns);
    }
}