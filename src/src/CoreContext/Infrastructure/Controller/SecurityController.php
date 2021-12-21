<?php

namespace App\CoreContext\Infrastructure\Controller;

use App\CoreContext\Application\Command\CreateUserCommand;
use App\CoreContext\Application\Query\FindUserByApiTokenQuery;
use App\CoreContext\Application\Query\FindUserByEmailAndPasswordQuery;
use App\ddd\Infrastructure\Controller\BaseController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends BaseController
{
    /**
     * @Route("/register", methods={"POST"})
     */
    public function register(Request $request): Response
    {
        $request = json_decode($request->getContent(), false);
        $command = new CreateUserCommand(
            $request->name,
            $request->surname,
            $request->secondSurname ?? null,
            $request->email,
            $request->password,
            $request->phone ?? null,
            $request->mobile ?? null,
            $request->companyName ?? null
        );

        $this->commandBus->dispatch($command);

        return $this->emptyResponse();
    }

    /**
     * @Route("/login", methods={"POST"})
     */
    public function login(Request $request): Response
    {
        $request = json_decode($request->getContent(), false);
        $query = new FindUserByEmailAndPasswordQuery(
            $request->email,
            $request->password
        );

        $response = $this->queryBus->handle($query);

        return $this->response($response);
    }

    /**
     * @Route("/me", methods={"GET"})
     */
    public function me(Request $request): Response
    {
        $query = new FindUserByApiTokenQuery($this->apiToken);
        $response = $this->queryBus->handle($query);

        return $this->response($response);
    }
}