<?php

namespace App\CrmContext\Infrastructure\Controller\Contact;

use App\CrmContext\Application\Command\Contact\CreateContactMethodCommand;
use App\CrmContext\Application\Query\Contact\FindContactMethodQuery;
use App\CrmContext\Application\Query\Contact\FindContactMethodsQuery;
use App\ddd\Infrastructure\Controller\BaseController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactMethodController extends BaseController
{
    /**
     * @Route("/contact-methods", methods={"POST"})
     */
    public function create(Request $request): Response
    {
        $request = json_decode($request->getContent(), false);
        $command = new CreateContactMethodCommand(
            $request->companyId,
            $request->name
        );

        $this->commandBus->dispatch($command);

        return $this->emptyResponse();
    }

    /**
     * @Route("/contact-methods/{id}", methods={"GET"})
     */
    public function find(string $id): Response
    {
        $query = new FindContactMethodQuery($id);
        $response = $this->queryBus->handle($query);

        return $this->response($response);
    }

    /**
     * @Route("/contact-methods", methods={"GET"})
     */
    public function list(): Response
    {
        $query = new FindContactMethodsQuery($this->companyId);
        $response = $this->queryBus->handle($query);

        return $this->response($response);
    }
}