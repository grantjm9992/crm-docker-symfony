<?php

namespace App\CrmContext\Application\Command\Contact;

use App\CrmContext\Domain\Model\Contact\ContactType;
use App\CrmContext\Domain\Model\Contact\ContactTypeRepository;
use App\ddd\CQRS\Command\CommandHandler;

class CreateContactTypeCommandHandler implements CommandHandler
{
    private ContactTypeRepository $contactTypeRepository;

    public function __construct(ContactTypeRepository $contactTypeRepository)
    {
        $this->contactTypeRepository = $contactTypeRepository;
    }

    public function __invoke(CreateContactTypeCommand $command): void
    {
        $contactType = new ContactType(
            $command->getCompanyId(),
            $command->getName()
        );

        $this->contactTypeRepository->save($contactType);
    }
}