<?php

namespace App\CrmContext\Infrastructure\Controller\Contact;

use App\CrmContext\Application\Command\Contact\CreateContactStatusCommand;
use App\CrmContext\Application\Query\Contact\FindContactStatusQuery;
use App\CrmContext\Application\Query\Contact\FindContactTypesQuery;
use App\ddd\Infrastructure\Controller\BaseController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactStatusController extends BaseController
{
    /**
     * @Route("/contact-statuses", methods={"POST"})
     */
    public function create(Request $request): Response
    {
        $request = json_decode($request->getContent(), false);
        $command = new CreateContactStatusCommand(
            $request->companyId,
            $request->name
        );

        $this->commandBus->dispatch($command);

        return $this->emptyResponse();
    }

    /**
     * @Route("/contact-statuses/{id}", methods={"GET"})
     */
    public function find(string $id): Response
    {
        $query = new FindContactStatusQuery($id);
        $response = $this->queryBus->handle($query);

        return $this->response($response);
    }

    /**
     * @Route("/contact-statuses", methods={"GET"})
     */
    public function list(): Response
    {
        $query = new FindContactTypesQuery($this->companyId);
        $response = $this->queryBus->handle($query);

        return $this->response($response);
    }


}