<?php

namespace App\CrmContext\Application\ViewFactory\Contact;

use App\CrmContext\Domain\Model\Contact\Contact;
use App\CrmContext\Domain\ViewModel\Contact\ContactView;
use App\ddd\Application\ViewFactory\AbstractViewFactory;

class ContactViewFactory
{
    use AbstractViewFactory;

    public static function create(Contact $contact): ContactView
    {
        return new ContactView(
            $contact->getId(),
            $contact->getCompanyId(),
            $contact->getName(),
            $contact->getSurname(),
            $contact->getEmail(),
            $contact->getPhone(),
            $contact->getMobile(),
            $contact->getCampaign(),
            $contact->getContactInterest(),
            $contact->getContactMethod(),
            $contact->getContactStatus(),
            $contact->getContactType()
        );
    }
}