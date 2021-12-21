<?php

namespace App\CoreContext\Domain\Model;

use DateTime;
use Ramsey\Uuid\Uuid;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserDoctrineRepository::class)
 */
class User
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
    private string $surname;

    /**
     * @ORM\Column(type="string", length=255, nullable="true")
     */
    private ?string $secondSurname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $password;

    /**
     * @ORM\Column(type="string", length=255, nullable="true")
     */
    private ?string $phone;

    /**
     * @ORM\Column(type="string", length=255, nullable="true")
     */
    private ?string $mobile;

    /**
     * @ORM\Column(type="string", length=255, nullable="true")
     */
    private ?string $apiToken;

    /**
     * @ORM\Column(type="string", length=255, nullable="true")
     */
    private ?string $companyName;

    /**
     * @ORM\ManyToOne(targetEntity="App\CoreContext\Domain\Model\Role")
     */
    protected ?Role $role;

    /**
     * @ORM\ManyToOne(targetEntity="App\CoreContext\Domain\Model\Company")
     */
    protected ?Company $company;

    /**
     * @var datetime $createdAt
     *
     * @ORM\Column(type="datetime")
     */
    protected DateTime $createdAt;

    /**
     * @var datetime $updatedAt
     *
     * @ORM\Column(type="datetime", nullable = true)
     */
    protected datetime $updatedAt;

    public function __construct(
        string $name,
        string $surname,
        ?string $secondSurname,
        string $email,
        string $password,
        ?string $phone,
        ?string $mobile,
        ?string $companyName
    )
    {
        $this->id = Uuid::uuid4()->toString();
        $this->name = $name;
        $this->surname = $surname;
        $this->secondSurname = $secondSurname;
        $this->email = $email;
        $this->password = \md5($password);
        $this->phone = $phone;
        $this->mobile = $mobile;
        $this->apiToken = Uuid::uuid4()->toString();
        $this->companyName = $companyName;

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
    public function getSurname(): string
    {
        return $this->surname;
    }

    /**
     * @return string|null
     */
    public function getSecondSurname(): ?string
    {
        return $this->secondSurname;
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
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @return string|null
     */
    public function getMobile(): ?string
    {
        return $this->mobile;
    }

    /**
     * @return string|null
     */
    public function getApiToken(): ?string
    {
        return $this->apiToken;
    }

    /**
     * @return string|null
     */
    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    public function getRole(): Role
    {
        return $this->role;
    }

    public function getCompany(): ?Company
    {
        return $this->company;
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

    public function update(
        string $name,
        string $surname,
        ?string $secondSurname,
        ?string $phone,
        ?string $mobile
    ): void
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->secondSurname = $secondSurname;
        $this->phone = $phone;
        $this->mobile = $mobile;
        $this->updatedAt = new \DateTime();
    }

    public function updateRole(Role $role): void
    {
        $this->role = $role;
    }

    public function setCompany(Company $company): void
    {
        $this->company = $company;
    }

    public function updatePassword(string $password): void
    {
        $this->password = $password;
        $this->updatedAt = new \DateTime();
    }

    public function updateEmail(string $email): void
    {
        $this->email = $email;
        $this->updatedAt = new \DateTime();
    }
}