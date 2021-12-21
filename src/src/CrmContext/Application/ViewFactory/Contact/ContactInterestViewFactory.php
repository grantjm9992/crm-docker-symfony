<?php

namespace App\CrmContext\Application\ViewFactory\Contact;

use App\CrmContext\Domain\Model\Contact\ContactInterest;
use App\CrmContext\Domain\ViewModel\Contact\ContactInterestView;
use App\ddd\Application\ViewFactory\AbstractViewFactory;

class ContactInterestViewFactory
{
    use AbstractViewFactory;

    public static function create(ContactInterest $contactMethod): ContactInterestView
    {
        return new ContactInterestView(
            $contactMethod->getId(),
            $contactMethod->getCompanyId(),
            $contactMethod->getName()
        );
    }
}