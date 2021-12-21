<?php

namespace App\CrmContext\Application\ViewFactory\Contact;

use App\CrmContext\Domain\Model\Contact\ContactMethod;
use App\CrmContext\Domain\ViewModel\Contact\ContactMethodView;
use App\ddd\Application\ViewFactory\AbstractViewFactory;

class ContactMethodViewFactory
{
    use AbstractViewFactory;

    public static function create(ContactMethod $contactMethod): ContactMethodView
    {
        return new ContactMethodView(
            $contactMethod->getId(),
            $contactMethod->getCompanyId(),
            $contactMethod->getName()
        );
    }
}