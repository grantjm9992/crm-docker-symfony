<?php

namespace App\CrmContext\Infrastructure\Controller\Contact;

use App\CrmContext\Application\Command\Contact\CreateContactInterestCommand;
use App\CrmContext\Application\Query\Contact\FindContactInterestQuery;
use App\CrmContext\Application\Query\Contact\FindContactInterestsQuery;
use App\ddd\Infrastructure\Controller\BaseController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactInterestController extends BaseController
{
    /**
     * @Route("/contact-interests", methods={"POST"})
     */
    public function create(Request $request): Response
    {
        $request = json_decode($request->getContent(), false);
        $command = new CreateContactInterestCommand(
            $request->companyId,
            $request->name
        );

        $this->commandBus->dispatch($command);

        return $this->emptyResponse();
    }

    /**
     * @Route("/contact-interests/{id}", methods={"GET"})
     */
    public function find(string $id): Response
    {
        $query = new FindContactInterestQuery($id);
        $response = $this->queryBus->handle($query);

        return $this->response($response);
    }

    /**
     * @Route("/contact-interests", methods={"GET"})
     */
    public function list(): Response
    {
        $query = new FindContactInterestsQuery($this->companyId);
        $response = $this->queryBus->handle($query);

        return $this->response($response);
    }
}