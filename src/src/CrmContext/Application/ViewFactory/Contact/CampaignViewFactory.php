<?php

namespace App\CrmContext\Application\ViewFactory\Contact;

use App\CrmContext\Domain\Model\Contact\Campaign;
use App\CrmContext\Domain\ViewModel\Contact\CampaignView;
use App\ddd\Application\ViewFactory\AbstractViewFactory;

class CampaignViewFactory
{
    use AbstractViewFactory;

    public static function create(Campaign $campaign): CampaignView
    {
        return new CampaignView(
            $campaign->getId(),
            $campaign->getCompanyId(),
            $campaign->getName()
        );
    }

}