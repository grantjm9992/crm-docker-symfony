<?php

namespace App\CoreContext\Application\Command;

use App\CoreContext\Domain\Model\CompanyApplicationRepository;
use App\ddd\CQRS\Command\CommandHandler;
use Doctrine\ORM\EntityNotFoundException;

class UninstallCompanyApplicationCommandHandler implements CommandHandler
{
    private CompanyApplicationRepository $companyApplicationRepository;

    public function __construct(CompanyApplicationRepository $companyApplicationRepository)
    {
        $this->companyApplicationRepository = $companyApplicationRepository;
    }

    public function __invoke(UninstallCompanyApplicationCommand $command): void
    {
        $companyApplication = $this->companyApplicationRepository->byCompanyIdAndApplicationId($command->getCompanyId(), $command->getApplicationId());
        if ($companyApplication === null) {
            throw new EntityNotFoundException();
        }

        $companyApplication->uninstall();

        $this->companyApplicationRepository->save($companyApplication);
    }
}