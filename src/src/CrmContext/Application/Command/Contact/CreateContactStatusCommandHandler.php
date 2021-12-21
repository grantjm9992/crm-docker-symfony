<?php

namespace App\CrmContext\Application\Command\Contact;

use App\CrmContext\Domain\Model\Contact\ContactStatus;
use App\CrmContext\Domain\Model\Contact\ContactStatusRepository;
use App\ddd\CQRS\Command\CommandHandler;

class CreateContactStatusCommandHandler implements CommandHandler
{
    private ContactStatusRepository $contactStatusRepository;

    public function __construct(ContactStatusRepository $contactStatusRepository)
    {
        $this->contactStatusRepository = $contactStatusRepository;
    }

    public function __invoke(CreateContactStatusCommand $command): void
    {
        $contactStatus = new ContactStatus(
            $command->getCompanyId(),
            $command->getName()
        );

        $this->contactStatusRepository->save($contactStatus);
    }
}