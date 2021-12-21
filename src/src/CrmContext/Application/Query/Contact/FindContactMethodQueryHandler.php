<?php

namespace App\CrmContext\Application\Query\Contact;

use App\CrmContext\Application\ViewFactory\Contact\ContactMethodViewFactory;
use App\CrmContext\Domain\Model\Contact\ContactMethodRepository;
use App\CrmContext\Domain\ViewModel\Contact\ContactMethodView;
use App\ddd\CQRS\Query\QueryHandler;
use Doctrine\ORM\EntityNotFoundException;

class FindContactMethodQueryHandler implements QueryHandler
{
    private ContactMethodRepository $contactMethodRepository;

    public function __construct(ContactMethodRepository $contactMethodRepository)
    {
        $this->contactMethodRepository = $contactMethodRepository;
    }

    public function __invoke(FindContactMethodQuery $query): ContactMethodView
    {
        $contactMethod = $this->contactMethodRepository->byId($query->getId());
        if ($contactMethod === null) {
            throw new EntityNotFoundException();
        }

        return ContactMethodViewFactory::create($contactMethod);
    }
}