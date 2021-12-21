<?php

namespace App\CoreContext\Application\Query;

use App\CoreContext\Application\ViewFactory\CompanyViewFactory;
use App\CoreContext\Domain\Model\CompanyRepository;
use App\CoreContext\Domain\Model\UserRepository;
use App\CoreContext\Domain\ViewModel\CompanyView;
use App\ddd\CQRS\Query\QueryHandler;

class FindCompanyQueryHandler implements QueryHandler
{
    private CompanyRepository $companyRepository;
    private UserRepository $userRepository;

    public function __construct(CompanyRepository $companyRepository, UserRepository $userRepository)
    {
        $this->companyRepository = $companyRepository;
        $this->userRepository = $userRepository;
    }

    public function __invoke(FindCompanyQuery $query): ?CompanyView
    {
        $company = $this->companyRepository->byId($query->getId());
        if ($company === null) {
            return null;
        }

        $superUser = $this->userRepository->byEmail($company->getNotificationEmail());

        return CompanyViewFactory::create($company, $superUser);
    }
}