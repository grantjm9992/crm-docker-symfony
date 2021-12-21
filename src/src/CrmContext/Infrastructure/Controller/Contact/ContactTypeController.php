<?php

namespace App\CrmContext\Infrastructure\Controller\Contact;

use App\CrmContext\Application\Command\Contact\CreateContactTypeCommand;
use App\CrmContext\Application\Query\Contact\FindContactTypeQuery;
use App\CrmContext\Application\Query\Contact\FindContactTypesQuery;
use App\ddd\Infrastructure\Controller\BaseController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactTypeController extends BaseController
{
    /**
     * @Route("/contact-types", methods={"POST"})
     */
    public function create(Request $request): Response
    {
        $request = json_decode($request->getContent(), false);
        $command = new CreateContactTypeCommand(
            $request->companyId,
            $request->name
        );

        $this->commandBus->dispatch($command);

        return $this->emptyResponse();
    }

    /**
     * @Route("/contact-types/{id}", methods={"GET"})
     */
    public function find(string $id): Response
    {
        $query = new FindContactTypeQuery($id);
        $response = $this->queryBus->handle($query);

        return $this->response($response);
    }

    /**
     * @Route("/contact-types", methods={"GET"})
     */
    public function list(): Response
    {
        $query = new FindContactTypesQuery($this->companyId);
        $response = $this->queryBus->handle($query);

        return $this->response($response);
    }


}