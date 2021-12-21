<?php

namespace App\CrmContext\Domain\ViewModel\Contact;

use App\CrmContext\Application\ViewFactory\Contact\CampaignViewFactory;
use App\CrmContext\Application\ViewFactory\Contact\ContactInterestViewFactory;
use App\CrmContext\Application\ViewFactory\Contact\ContactMethodViewFactory;
use App\CrmContext\Application\ViewFactory\Contact\ContactStatusViewFactory;
use App\CrmContext\Application\ViewFactory\Contact\ContactTypeViewFactory;
use App\CrmContext\Domain\Model\Contact\Campaign;
use App\CrmContext\Domain\Model\Contact\ContactInterest;
use App\CrmContext\Domain\Model\Contact\ContactMethod;
use App\CrmContext\Domain\Model\Contact\ContactStatus;
use App\CrmContext\Domain\Model\Contact\ContactType;

class ContactView
{
    public string $id;
    public string $companyId;
    public string $name;
    public string $surname;
    public string $email;
    public string $phone;
    public string $mobile;
    public $campaign;
    public $contactInterest;
    public $contactMethod;
    public $contactStatus;
    public $contactType;

    public function __construct(
        string $id,
        string $companyId,
        string $name,
        string $surname,
        string $email,
        string $phone,
        string $mobile,
        Campaign $campaign,
        ContactInterest $contactInterest,
        ContactMethod $contactMethod,
        ContactStatus $contactStatus,
        ContactType $contactType
    )
    {
        $this->id = $id;
        $this->companyId = $companyId;
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->phone = $phone;
        $this->mobile = $mobile;
        $this->campaign = CampaignViewFactory::create($campaign);
        $this->contactInterest = ContactInterestViewFactory::create($contactInterest);
        $this->contactMethod = ContactMethodViewFactory::create($contactMethod);
        $this->contactStatus = ContactStatusViewFactory::create($contactStatus);
        $this->contactType = ContactTypeViewFactory::create($contactType);
    }
}