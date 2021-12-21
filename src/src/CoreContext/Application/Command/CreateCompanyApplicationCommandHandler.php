<?php

namespace App\CoreContext\Application\Command;

use App\CoreContext\Domain\Model\ApplicationRepository;
use App\CoreContext\Domain\Model\CompanyApplication;
use App\CoreContext\Domain\Model\CompanyApplicationRepository;
use App\CoreContext\Domain\Model\CompanyRepository;
use App\ddd\CQRS\Command\CommandHandler;
use Doctrine\ORM\EntityNotFoundException;

class CreateCompanyApplicationCommandHandler implements CommandHandler
{
    private CompanyApplicationRepository $companyApplicationRepository;
    private CompanyRepository $companyRepository;
    private ApplicationRepository $applicationRepository;

    public function __construct(
        CompanyApplicationRepository $companyApplicationRepository,
        CompanyRepository $companyRepository,
        ApplicationRepository $applicationRepository
    )
    {
        $this->companyApplicationRepository = $companyApplicationRepository;
        $this->companyRepository = $companyRepository;
        $this->applicationRepository = $applicationRepository;
    }

    public function __invoke(CreateCompanyApplicationCommand $command): void
    {
        $company = $this->companyRepository->byId($command->getCompanyId());
        if ($company === null) {
            throw new EntityNotFoundException();
        }

        $application = $this->applicationRepository->byId($command->getApplicationId());
        if ($application === null) {
            throw new EntityNotFoundException();
        }

        $companyApplication = new CompanyApplication(
            $company,
            $application
        );

        $this->companyApplicationRepository->save($companyApplication);
    }
}