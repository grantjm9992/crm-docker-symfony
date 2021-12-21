<?php

namespace App\ddd\Infrastructure\Controller;

use App\CoreContext\Domain\Model\UserRepository;
use App\ddd\CQRS\Command\CommandBus;
use App\ddd\CQRS\Query\QueryBus;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Symfony\Component\Routing\Annotation\Route;

class BaseController extends AbstractController
{
    private const WHITELIST = [
        '/api/v1/core/register',
        '/api/v1/core/login'
    ];

    public ?Request $request;
    public QueryBus $queryBus;
    public CommandBus $commandBus;
    private UserRepository $userRepository;
    protected ?string $apiToken;
    protected ?string $companyId;

    public function __construct(
        QueryBus $queryBus,
        CommandBus $commandBus,
        RequestStack $requestStack,
        UserRepository $userRepository,
        ?string $apiToken = null,
        ?string $companyId = null
    )
    {
        $this->request = $requestStack->getCurrentRequest();
        $this->userRepository = $userRepository;
        $this->queryBus = $queryBus;
        $this->commandBus = $commandBus;
        $this->verifyUser();
    }

    public function response($response): Response
    {
        return new Response(json_encode($response), 200, ['content-type' => 'application/json']);
    }

    public function emptyResponse(): Response
    {
        return new Response('OK', 201);
    }

    protected function verifyUser()
    {
        $path = $this->request->getPathInfo();
        if (!in_array($path, self::WHITELIST)) {
            $token = $this->request->headers->get('Authorization');
            $token = str_replace('Bearer ', '', $token);
            $user = $this->userRepository->byApiToken($token);
            if ($user === null) {
                throw new UnauthorizedHttpException('');
            }
            $this->apiToken = $token;
            $this->companyId = $user->getCompany()->getId();
        }
    }
}