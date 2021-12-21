<?php

namespace App\CrmContext\Infrastructure\Controller\Contact;

use App\CrmContext\Application\Command\Contact\CreateContactCommand;
use App\CrmContext\Application\Query\Contact\FindContactQuery;
use App\CrmContext\Application\Query\Contact\FindContactsQuery;
use App\ddd\Infrastructure\Controller\BaseController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends BaseController
{
    /**
     * @Route("/contacts", methods={"POST"})
     */
    public function create(Request $request): Response
    {
        $request = json_decode($request->getContent(), false);
        $command = new CreateContactCommand(
            $request->companyId,
            $request->name,
            $request->surname,
            $request->email,
            $request->phone,
            $request->mobile,
            $request->campaignId,
            $request->contactInterestId,
            $request->contactMethodId,
            $request->contactStatusId,
            $request->contactTypeId
        );

        $this->commandBus->dispatch($command);

        return $this->emptyResponse();
    }


    /**
     * @Route("/contacts/{id}", methods={"GET"})
     */
    public function find(string $id): Response
    {
        $query = new FindContactQuery($id);
        $response = $this->queryBus->handle($query);

        return $this->response($response);
    }

    /**
     * @Route("/contacts", methods={"GET"})
     */
    public function list(): Response
    {
        $query = new FindContactsQuery($this->companyId);
        $response = $this->queryBus->handle($query);

        return $this->response($response);
    }
}