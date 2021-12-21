<?php

namespace App\CrmContext\Application\ViewFactory\Contact;

use App\CrmContext\Domain\Model\Contact\ContactType;
use App\CrmContext\Domain\ViewModel\Contact\ContactTypeView;
use App\ddd\Application\ViewFactory\AbstractViewFactory;

class ContactTypeViewFactory
{
    use AbstractViewFactory;

    public static function create(ContactType $contactType): ContactTypeView
    {
        return new ContactTypeView(
            $contactType->getId(),
            $contactType->getCompanyId(),
            $contactType->getName()
        );
    }
}