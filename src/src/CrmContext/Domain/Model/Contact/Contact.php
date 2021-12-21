<?php

namespace App\CrmContext\Domain\Model\Contact;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;

/**
 * @ORM\Entity(repositoryClass=ContactDoctrineRepository::class)
 */
class Contact
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=255)
     */
    private string $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private string $companyId;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $surname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private string $phone;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private string $mobile;

    /**
     * @ORM\ManyToOne(targetEntity="App\CrmContext\Domain\Model\Contact\Campaign")
     */
    private Campaign $campaign;

    /**
     * @ORM\ManyToOne(targetEntity="App\CrmContext\Domain\Model\Contact\ContactInterest")
     */
    private ContactInterest $contactInterest;

    /**
     * @ORM\ManyToOne(targetEntity="App\CrmContext\Domain\Model\Contact\ContactMethod")
     */
    private ContactMethod $contactMethod;

    /**
     * @ORM\ManyToOne(targetEntity="App\CrmContext\Domain\Model\Contact\ContactStatus")
     */
    private ContactStatus $contactStatus;

    /**
     * @ORM\ManyToOne(targetEntity="App\CrmContext\Domain\Model\Contact\ContactType")
     */
    private ContactType $contactType;

    /**
     * @ORM\Column(type="datetime")
     */
    private DateTime $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private ?DateTime $updatedAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private ?DateTime $deletedAt;

    public function __construct(
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
        $this->id = Uuid::uuid4()->toString();
        $this->companyId = $companyId;
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->phone = $phone;
        $this->mobile = $mobile;
        $this->campaign = $campaign;
        $this->contactInterest = $contactInterest;
        $this->contactMethod = $contactMethod;
        $this->contactStatus = $contactStatus;
        $this->contactType = $contactType;

        $this->createdAt = new DateTime('now');
        $this->updatedAt = new DateTime('now');
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
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
     * @return Campaign
     */
    public function getCampaign(): Campaign
    {
        return $this->campaign;
    }

    /**
     * @return ContactInterest
     */
    public function getContactInterest(): ContactInterest
    {
        return $this->contactInterest;
    }

    /**
     * @return ContactMethod
     */
    public function getContactMethod(): ContactMethod
    {
        return $this->contactMethod;
    }

    /**
     * @return ContactStatus
     */
    public function getContactStatus(): ContactStatus
    {
        return $this->contactStatus;
    }

    /**
     * @return ContactType
     */
    public function getContactType(): ContactType
    {
        return $this->contactType;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    /**
     * @return DateTime|null
     */
    public function getUpdatedAt(): ?DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @return DateTime|null
     */
    public function getDeletedAt(): ?DateTime
    {
        return $this->deletedAt;
    }
}