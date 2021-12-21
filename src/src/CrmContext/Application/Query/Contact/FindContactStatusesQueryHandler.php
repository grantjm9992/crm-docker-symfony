<?php

namespace App\CrmContext\Application\Query\Contact;

use App\CrmContext\Application\ViewFactory\Contact\ContactStatusViewFactory;
use App\CrmContext\Domain\Model\Contact\ContactStatusRepository;
use App\ddd\CQRS\Query\QueryHandler;

class FindContactStatusesQueryHandler implements QueryHandler
{
    private ContactStatusRepository $contactStatusRepository;

    public function __construct(ContactStatusRepository $contactStatusRepository)
    {
        $this->contactStatusRepository = $contactStatusRepository;
    }

    public function __invoke(FindContactStatusesQuery $query): array
    {
        $contactTypes = $this->contactStatusRepository->byCompanyId($query->getCompanyId());

        return ContactStatusViewFactory::createCollection($contactTypes);
    }
}