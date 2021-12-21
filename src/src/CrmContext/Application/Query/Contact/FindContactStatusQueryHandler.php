<?php

namespace App\CrmContext\Application\Query\Contact;

use App\CrmContext\Application\ViewFactory\Contact\ContactStatusViewFactory;
use App\CrmContext\Domain\Model\Contact\ContactStatusRepository;
use App\CrmContext\Domain\ViewModel\Contact\ContactStatusView;
use App\ddd\CQRS\Query\QueryHandler;
use Doctrine\ORM\EntityNotFoundException;

class FindContactStatusQueryHandler implements QueryHandler
{
    private ContactStatusRepository $contactStatusRepository;

    public function __construct(ContactStatusRepository $contactStatusRepository)
    {
        $this->contactStatusRepository = $contactStatusRepository;
    }

    public function __invoke(FindContactStatusQuery $query): ContactStatusView
    {
        $contactStatus = $this->contactStatusRepository->byId($query->getId());

        if ($contactStatus === null) {
            throw new EntityNotFoundException();
        }

        return ContactStatusViewFactory::create($contactStatus);
    }
}