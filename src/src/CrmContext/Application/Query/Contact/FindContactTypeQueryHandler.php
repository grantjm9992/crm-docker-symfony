<?php

namespace App\CrmContext\Application\Query\Contact;

use App\CrmContext\Application\ViewFactory\Contact\ContactTypeViewFactory;
use App\CrmContext\Domain\Model\Contact\ContactTypeRepository;
use App\CrmContext\Domain\ViewModel\Contact\ContactTypeView;
use App\ddd\CQRS\Query\QueryHandler;
use Doctrine\ORM\EntityNotFoundException;

class FindContactTypeQueryHandler implements QueryHandler
{
    private ContactTypeRepository $contactTypeRepository;

    public function __construct(ContactTypeRepository $contactTypeRepository)
    {
        $this->contactTypeRepository = $contactTypeRepository;
    }

    public function __invoke(FindContactTypeQuery $query): ContactTypeView
    {
        $contactType = $this->contactTypeRepository->byId($query->getId());
        if ($contactType === null) {
            throw new EntityNotFoundException();
        }

        return ContactTypeViewFactory::create($contactType);
    }
}