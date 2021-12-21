<?php

namespace App\CoreContext\Infrastructure\Controller;

use App\CoreContext\Application\Command\CreateCompanyApplicationCommand;
use App\CoreContext\Application\Command\UninstallCompanyApplicationCommand;
use App\CoreContext\Application\Query\FindCompanyApplicationsQuery;
use App\ddd\Infrastructure\Controller\BaseController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/applications")
 */
class CompanyApplicationController extends BaseController
{
    /**
     * @Route("/", methods={"GET"})
     */
    public function list(): Response
    {
        $query = new FindCompanyApplicationsQuery(
            $this->companyId
        );

        $response = $this->queryBus->handle($query);

        return $this->response($response);
    }

    /**
     * @Route("/{applicationId}", methods={"GET"})
     */
    public function install(string $applicationId): Response
    {
        $command = new CreateCompanyApplicationCommand(
            $this->companyId,
            $applicationId
        );

        $this->commandBus->dispatch($command);

        return $this->emptyResponse();
    }

    /**
     * @Route("/{applicationId}/uninstall", methods={"GET"})
     */
    public function uninstall(string $applicationId): Response
    {
        $command = new UninstallCompanyApplicationCommand(
            $this->companyId,
            $applicationId
        );

        $this->commandBus->dispatch($command);

        return $this->emptyResponse();
    }
}