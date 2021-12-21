<?php

namespace App\CrmContext\Application\Command\Contact;

use App\CrmContext\Domain\Model\Contact\Campaign;
use App\CrmContext\Domain\Model\Contact\CampaignRepository;
use App\ddd\CQRS\Command\CommandHandler;

class CreateCampaignCommandHandler implements CommandHandler
{
    private CampaignRepository $campaignRepository;

    public function __construct(CampaignRepository $campaignRepository)
    {
        $this->campaignRepository = $campaignRepository;
    }

    public function __invoke(CreateCampaignCommand $command): void
    {
        $campaign = new Campaign(
            $command->getCompanyId(),
            $command->getName()
        );

        $this->campaignRepository->save($campaign);
    }
}