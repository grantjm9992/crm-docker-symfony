<?php

namespace App\CrmContext\Application\Command\Contact;

use App\CrmContext\Domain\Model\Contact\ContactInterest;
use App\CrmContext\Domain\Model\Contact\ContactInterestRepository;
use App\ddd\CQRS\Command\CommandHandler;

class CreateContactInterestCommandHandler implements CommandHandler
{
    private ContactInterestRepository $contactInterestRepository;

    public function __construct(ContactInterestRepository $contactInterestRepository)
    {
        $this->contactInterestRepository = $contactInterestRepository;
    }

    public function __invoke(CreateContactInterestCommand $command): void
    {
        $contactInterest = new ContactInterest(
            $command->getCompanyId(),
            $command->getName()
        );

        $this->contactInterestRepository->save($contactInterest);
    }
}