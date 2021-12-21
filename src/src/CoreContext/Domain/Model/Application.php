<?php

namespace App\CoreContext\Domain\Model;

use DateTime;
use Ramsey\Uuid\Uuid;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ApplicationDoctrineRepository::class)
 */
class Application
{
    public const CORE_CONTEXT = 'coreContext';
    public const CRM_CONTEXT = 'crmContext';

    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=255)
     */
    private string $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $key;

    /**
     * @ORM\Column(type="datetime")
     */
    private DateTime $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private DateTime $updatedAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private ?DateTime $deletedAt;

    public function __construct(
        string $key
    )
    {
        $this->id = Uuid::uuid4()->toString();
        $this->key = $key;

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
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    /**
     * @return DateTime
     */
    public function getUpdatedAt(): DateTime
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