<?php

namespace App\CoreContext\Infrastructure\Controller;

use App\CoreContext\Application\Command\CreateCompanyCommand;
use App\CoreContext\Application\Query\FindCompanyQuery;
use App\ddd\Infrastructure\Controller\BaseController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/companies")
 */
class CompanyController extends BaseController
{
    /**
     * @Route("/create", methods={"POST"})
     */
    public function create(Request $request): Response
    {
        $request = json_decode($request->getContent(), false);
        $command = new CreateCompanyCommand(
            $request->name,
            $request->notificationEmail,
            null
        );

        $this->commandBus->dispatch($command);
        return $this->emptyResponse();
    }

    /**
     * @Route("/{id}", methods={"GET"})
     */
    public function find(string $id): Response
    {
        $query = new FindCompanyQuery($id);
        $result = $this->queryBus->handle($query);

        return $this->response($result);
    }


}