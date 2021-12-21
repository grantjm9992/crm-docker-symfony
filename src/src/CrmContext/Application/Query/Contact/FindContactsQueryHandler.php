<?php

namespace App\CrmContext\Application\Query\Contact;

use App\CrmContext\Application\ViewFactory\Contact\ContactViewFactory;
use App\CrmContext\Domain\Model\Contact\ContactRepository;
use App\ddd\CQRS\Query\QueryHandler;

class FindContactsQueryHandler implements QueryHandler
{
    private ContactRepository $contactRepository;

    public function __construct(ContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    public function __invoke(FindContactsQuery $query): array
    {
        $contactTypes = $this->contactRepository->byCompanyId($query->getCompanyId());

        return ContactViewFactory::createCollection($contactTypes);
    }
}