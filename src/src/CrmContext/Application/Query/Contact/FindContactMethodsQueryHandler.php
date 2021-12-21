<?php

namespace App\CrmContext\Application\Query\Contact;

use App\CrmContext\Application\ViewFactory\Contact\ContactMethodViewFactory;
use App\CrmContext\Domain\Model\Contact\ContactMethodRepository;
use App\ddd\CQRS\Query\QueryHandler;

class FindContactMethodsQueryHandler implements QueryHandler
{
    private ContactMethodRepository $contactMethodRepository;

    public function __construct(ContactMethodRepository $contactMethodRepository)
    {
        $this->contactMethodRepository = $contactMethodRepository;
    }

    public function __invoke(FindContactMethodsQuery $query): array
    {
        $contactMethods = $this->contactMethodRepository->byCompanyId($query->getCompanyId());

        return ContactMethodViewFactory::createCollection($contactMethods);
    }
}