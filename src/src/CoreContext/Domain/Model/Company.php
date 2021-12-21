<?php

namespace App\CoreContext\Domain\Model;

use DateTime;
use Ramsey\Uuid\Uuid;
use Doctrine\ORM\Mapping as ORM;
use App\CoreContext\Infrastructure\Domain\CompanyDoctrineRepository;

/**
 * @ORM\Entity(repositoryClass=CompanyDoctrineRepository::class)
 */
class Company
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=255)
     */
    private string $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $notificationEmail;

    /**
     * @ORM\Column(type="string", length=255, nullable = true)
     */
    private ?string $token;

    /**
     * @var DateTime $createdAt
     *
     * @ORM\Column(type="datetime")
     */
    protected DateTime $createdAt;

    /**
     * @var DateTime $updatedAt
     *
     * @ORM\Column(type="datetime", nullable = true)
     */
    protected \DateTime $updatedAt;

    public function __construct(
        string $name,
        string $notificationEmail,
        ?string $token
    )
    {
        $this->id = Uuid::uuid4()->toString();
        $this->name = $name;
        $this->notificationEmail = $notificationEmail;
        $this->token = $token;

        $this->createdAt = new \DateTime();
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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getNotificationEmail(): string
    {
        return $this->notificationEmail;
    }

    /**
     * @return string|null
     */
    public function getToken(): ?string
    {
        return $this->token;
    }

    /**
     * @return datetime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return datetime
     */
    public function getUpdatedAt(): datetime
    {
        return $this->updatedAt;
    }
}