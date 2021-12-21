<?php

namespace App\CrmContext\Application\Command\Contact;

use App\ddd\CQRS\Command\Command;

class CreateContactCommand implements Command
{
    private string $companyId;
    private string $name;
    private string $surname;
    private string $email;
    private string $phone;
    private string $mobile;
    private string $campaignId;
    private string $contactInterestId;
    private string $contactMethodId;
    private string $contactStatusId;
    private string $contactTypeId;

    public function __construct(
        string $companyId,
        string $name,
        string $surname,
        string $email,
        string $phone,
        string $mobile,
        string $campaignId,
        string $contactInterestId,
        string $contactMethodId,
        string $contactStatusId,
        string $contactTypeId
    )
    {
        $this->companyId = $companyId;
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->phone = $phone;
        $this->mobile = $mobile;
        $this->campaignId = $campaignId;
        $this->contactInterestId = $contactInterestId;
        $this->contactMethodId = $contactMethodId;
        $this->contactStatusId = $contactStatusId;
        $this->contactTypeId = $contactTypeId;
    }

    /**
     * @return string
     */
    public function getCompanyId(): string
    {
        return $this->companyId;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getSurname(): string
    {
        return $this->surname;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @return string
     */
    public function getMobile(): string
    {
        return $this->mobile;
    }

    /**
     * @return string
     */
    public function getCampaignId(): string
    {
        return $this->campaignId;
    }

    /**
     * @return string
     */
    public function getContactInterestId(): string
    {
        return $this->contactInterestId;
    }

    /**
     * @return string
     */
    public function getContactMethodId(): string
    {
        return $this->contactMethodId;
    }

    /**
     * @return string
     */
    public function getContactStatusId(): string
    {
        return $this->contactStatusId;
    }

    /**
     * @return string
     */
    public function getContactTypeId(): string
    {
        return $this->contactTypeId;
    }

}