<?php

namespace App\CoreContext\Domain\Model;

use DateTime;
use Ramsey\Uuid\Uuid;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CompanyApplicationDoctrineRepository::class)
 */
class CompanyApplication
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=255)
     */
    private string $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\CoreContext\Domain\Model\Company")
     */
    private Company $company;

    /**
     * @ORM\ManyToOne(targetEntity="App\CoreContext\Domain\Model\Application")
     */
    private Application $application;

    /**
     * @ORM\Column(type="datetime")
     */
    private DateTime $installedOn;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private ?DateTime $uninstalledOn;

    public function __construct(
        Company $company,
        Application $application
    )
    {
        $this->id = Uuid::uuid4()->toString();
        $this->company = $company;
        $this->application = $application;

        $this->installedOn = new DateTime('now');
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return Company
     */
    public function getCompany(): Company
    {
        return $this->company;
    }

    /**
     * @return Application
     */
    public function getApplication(): Application
    {
        return $this->application;
    }

    /**
     * @return DateTime
     */
    public function getInstalledOn(): DateTime
    {
        return $this->installedOn;
    }

    /**
     * @return DateTime|null
     */
    public function getUninstalledOn(): ?DateTime
    {
        return $this->uninstalledOn;
    }

    public function uninstall(): void
    {
        $this->uninstalledOn = new DateTime('now');
    }

    public function reinstall(): void
    {
        $this->uninstalledOn = null;
    }
}