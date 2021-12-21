<?php

namespace App\CoreContext\Application\Query;

use App\CoreContext\Application\ViewFactory\ApplicationViewFactory;
use App\CoreContext\Domain\Model\ApplicationRepository;
use App\CoreContext\Domain\ViewModel\ApplicationView;
use App\ddd\CQRS\Query\QueryHandler;

class FindApplicationQueryHandler implements QueryHandler
{
    private ApplicationRepository $applicationRepository;

    public function __construct(ApplicationRepository $applicationRepository)
    {
        $this->applicationRepository = $applicationRepository;
    }

    public function __invoke(FindApplicationQuery $query): ApplicationView
    {
        $application = $this->applicationRepository->byKey($query->getKey());

        return ApplicationViewFactory::create($application);
    }
}