<?php

namespace App\CrmContext\Infrastructure\Controller\Contact;

use App\CrmContext\Application\Command\Contact\CreateCampaignCommand;
use App\CrmContext\Application\Query\Contact\FindCampaignQuery;
use App\CrmContext\Application\Query\Contact\FindCampaignsQuery;
use App\ddd\Infrastructure\Controller\BaseController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CampaignController extends BaseController
{
    /**
     * @Route("/campaigns", methods={"POST"})
     */
    public function create(Request $request): Response
    {
        $request = json_decode($request->getContent(), false);
        $command = new CreateCampaignCommand(
            $request->companyId,
            $request->name
        );

        $this->commandBus->dispatch($command);

        return $this->emptyResponse();
    }

    /**
     * @Route("/campaigns/{id}", methods={"GET"})
     */
    public function find(string $id): Response
    {
        $query = new FindCampaignQuery($id);
        $response = $this->queryBus->handle($query);

        return $this->response($response);
    }

    /**
     * @Route("/campaigns", methods={"GET"})
     */
    public function list(): Response
    {
        $query = new FindCampaignsQuery($this->companyId);
        $response = $this->queryBus->handle($query);

        return $this->response($response);
    }
}