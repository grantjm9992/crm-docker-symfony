<?php

namespace App\CrmContext\Application\Command\Contact;

use App\CrmContext\Domain\Model\Contact\ContactMethod;
use App\CrmContext\Domain\Model\Contact\ContactMethodRepository;
use App\ddd\CQRS\Command\CommandHandler;

class CreateContactMethodCommandHandler implements CommandHandler
{
    private ContactMethodRepository $contactMethodRepository;

    public function __construct(ContactMethodRepository $contactMethodRepository)
    {
        $this->contactMethodRepository = $contactMethodRepository;
    }

    public function __invoke(CreateContactMethodCommand $command): void
    {
        $contactMethod = new ContactMethod(
            $command->getCompanyId(),
            $command->getName()
        );

        $this->contactMethodRepository->save($contactMethod);
    }
}