<?php

namespace App\CrmContext\Application\Query\Contact;

use App\CrmContext\Application\ViewFactory\Contact\ContactInterestViewFactory;
use App\CrmContext\Domain\Model\Contact\ContactInterestRepository;
use App\CrmContext\Domain\ViewModel\Contact\ContactInterestView;
use App\ddd\CQRS\Query\QueryHandler;
use Doctrine\ORM\EntityNotFoundException;

class FindContactInterestQueryHandler implements QueryHandler
{
    private ContactInterestRepository $contactInterestRepository;

    public function __construct(ContactInterestRepository $contactInterestRepository)
    {
        $this->contactInterestRepository = $contactInterestRepository;
    }

    public function __invoke(FindContactInterestQuery $query): ContactInterestView
    {
        $contactInterest = $this->contactInterestRepository->byId($query->getId());
        if ($contactInterest === null) {
            throw new EntityNotFoundException();
        }

        return ContactInterestViewFactory::create($contactInterest);
    }
}