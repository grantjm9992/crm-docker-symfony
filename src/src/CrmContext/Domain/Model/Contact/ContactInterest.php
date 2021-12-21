<?php

namespace App\CrmContext\Domain\Model\Contact;


use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;

/**
 * @ORM\Entity(repositoryClass=ContactInterestDoctrineRepository::class)
 */
class ContactInterest
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=255)
     */
    private string $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $companyId;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $name;

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
        ?string $companyId,
        string $name
    )
    {
        $this->id = Uuid::uuid4()->toString();
        $this->companyId = $companyId;
        $this->name = $name;

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
     * @return string|null
     */
    public function getCompanyId(): ?string
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
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): ?DateTime
    {
        return $this->updatedAt;
    }

    public function getDeletedAt(): ?DateTime
    {
        return $this->deletedAt;
    }

    public function delete(): void
    {
        $this->deletedAt = new DateTime('now');
    }
}