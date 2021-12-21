<?php

namespace App\CoreContext\Application\Query;

use App\CoreContext\Application\ViewFactory\ApplicationViewFactory;
use App\CoreContext\Domain\Model\ApplicationRepository;
use App\CoreContext\Domain\Model\CompanyApplicationRepository;
use App\ddd\CQRS\Query\QueryHandler;

class FindCompanyApplicationsQueryHandler implements QueryHandler
{
    private CompanyApplicationRepository $companyApplicationRepository;
    private ApplicationRepository $applicationRepository;

    public function __construct(
        CompanyApplicationRepository $companyApplicationRepository,
        ApplicationRepository $applicationRepository
    )
    {
        $this->companyApplicationRepository = $companyApplicationRepository;
        $this->applicationRepository = $applicationRepository;
    }

    public function __invoke(FindCompanyApplicationsQuery $query): array
    {
        $applications = [];
        $companyApplications = $this->companyApplicationRepository->byCompanyId($query->getCompanyId());
        foreach ($companyApplications as $companyApplication) {
            $application = $this->applicationRepository->byKey($companyApplication->getApplication()->getKey());
            $applications[] = ApplicationViewFactory::create($application);
        }

        return $applications;
    }

}