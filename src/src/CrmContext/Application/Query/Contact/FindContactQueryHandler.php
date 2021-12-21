<?php

namespace App\CrmContext\Application\Query\Contact;

use App\CrmContext\Application\ViewFactory\Contact\ContactViewFactory;
use App\CrmContext\Domain\Model\Contact\ContactRepository;
use App\CrmContext\Domain\ViewModel\Contact\ContactView;
use App\ddd\CQRS\Query\QueryHandler;

class FindContactQueryHandler implements QueryHandler
{
    private ContactRepository $contactRepository;

    public function __construct(ContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    public function __invoke(FindContactQuery $query): ContactView
    {
        $contact = $this->contactRepository->byId($query->getId());

        return ContactViewFactory::create($contact);
    }
}