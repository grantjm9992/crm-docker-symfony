<?php

namespace App\CrmContext\Application\Command\Contact;

use App\CrmContext\Domain\Model\Contact\CampaignRepository;
use App\CrmContext\Domain\Model\Contact\Contact;
use App\CrmContext\Domain\Model\Contact\ContactInterestRepository;
use App\CrmContext\Domain\Model\Contact\ContactMethodRepository;
use App\CrmContext\Domain\Model\Contact\ContactRepository;
use App\CrmContext\Domain\Model\Contact\ContactStatusRepository;
use App\CrmContext\Domain\Model\Contact\ContactTypeRepository;
use App\ddd\CQRS\Command\CommandHandler;

class CreateContactCommandHandler implements CommandHandler
{
    private ContactRepository $contactRepository;
    private CampaignRepository $campaignRepository;
    private ContactInterestRepository $contactInterestRepository;
    private ContactMethodRepository $contactMethodRepository;
    private ContactStatusRepository $contactStatusRepository;
    private ContactTypeRepository $contactTypeRepository;

    public function __construct(
        ContactRepository $contactRepository,
        CampaignRepository $campaignRepository,
        ContactInterestRepository $contactInterestRepository,
        ContactMethodRepository $contactMethodRepository,
        ContactStatusRepository $contactStatusRepository,
        ContactTypeRepository $contactTypeRepository
    )
    {
        $this->contactRepository = $contactRepository;
        $this->campaignRepository = $campaignRepository;
        $this->contactInterestRepository = $contactInterestRepository;
        $this->contactMethodRepository = $contactMethodRepository;
        $this->contactStatusRepository = $contactStatusRepository;
        $this->contactTypeRepository = $contactTypeRepository;
    }

    public function __invoke(CreateContactCommand $command)
    {
        $campaign = $this->campaignRepository->byId($command->getCampaignId());
        if ($campaign === null) {
            throw new \Exception();
        }

        $contactInterest = $this->contactInterestRepository->byId($command->getContactInterestId());
        if ($contactInterest === null) {
            throw new \Exception();
        }

        $contactMethod = $this->contactMethodRepository->byId($command->getContactMethodId());
        if ($contactMethod === null) {
            throw new \Exception();
        }

        $contactStatus = $this->contactStatusRepository->byId($command->getContactStatusId());
        if ($contactStatus === null) {
            throw new \Exception();
        }

        $contactType = $this->contactTypeRepository->byId($command->getContactTypeId());
        if ($contactType === null) {
            throw new \Exception();
        }

        $contact = new Contact(
            $command->getCompanyId(),
            $command->getName(),
            $command->getSurname(),
            $command->getEmail(),
            $command->getPhone(),
            $command->getMobile(),
            $campaign,
            $contactInterest,
            $contactMethod,
            $contactStatus,
            $contactType
        );

        $this->contactRepository->save($contact);
    }
}