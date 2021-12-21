<?php

namespace App\CrmContext\Application\ViewFactory\Contact;

use App\CrmContext\Domain\Model\Contact\ContactStatus;
use App\CrmContext\Domain\ViewModel\Contact\ContactStatusView;
use App\ddd\Application\ViewFactory\AbstractViewFactory;

class ContactStatusViewFactory
{
    use AbstractViewFactory;

    public static function create(ContactStatus $contactType): ContactStatusView
    {
        return new ContactStatusView(
            $contactType->getId(),
            $contactType->getCompanyId(),
            $contactType->getName()
        );
    }

}