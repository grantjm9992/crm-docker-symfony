<?php

namespace App\CrmContext\Application\Query\Contact;

use App\CrmContext\Application\ViewFactory\Contact\ContactTypeViewFactory;
use App\CrmContext\Domain\Model\Contact\ContactTypeRepository;
use App\CrmContext\Domain\ViewModel\Contact\ContactTypeView;
use App\ddd\CQRS\Query\QueryHandler;

class FindContactTypesQueryHandler implements QueryHandler
{
    private ContactTypeRepository $contactTypeRepository;

    public function __construct(ContactTypeRepository $contactTypeRepository)
    {
        $this->contactTypeRepository = $contactTypeRepository;
    }

    public function __invoke(FindContactTypesQuery $query): array
    {
        $contactTypes = $this->contactTypeRepository->byCompanyId($query->getCompanyId());

        return ContactTypeViewFactory::createCollection($contactTypes);
    }
}