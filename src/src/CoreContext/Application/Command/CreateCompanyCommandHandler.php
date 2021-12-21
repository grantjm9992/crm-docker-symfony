<?php

namespace App\CoreContext\Application\Command;

use App\CoreContext\Domain\Model\Company;
use App\CoreContext\Domain\Model\CompanyRepository;
use App\ddd\CQRS\Command\CommandHandler;

class CreateCompanyCommandHandler implements CommandHandler
{
    private CompanyRepository $companyRepository;

    public function __construct(CompanyRepository $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    public function __invoke(CreateCompanyCommand $command): Company
    {
        $company = new Company(
            $command->getName(),
            $command->getNotificationEmail(),
            $command->getToken()
        );

        $this->companyRepository->save($company);

        return $company;
    }
}