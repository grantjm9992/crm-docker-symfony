<?php

namespace App\CoreContext\Application\Query;

use App\CoreContext\Application\ViewFactory\UserViewFactory;
use App\CoreContext\Domain\Model\UserRepository;
use App\CoreContext\Domain\ViewModel\MeView;
use App\ddd\CQRS\Query\QueryHandler;
use Doctrine\ORM\EntityNotFoundException;

class FindUserByApiTokenQueryHandler implements QueryHandler
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function __invoke(FindUserByApiTokenQuery $query): ?MeView
    {
        $user = $this->userRepository->byApiToken($query->getApiToken());

        if ($user === null) {
            throw new EntityNotFoundException();
        }

        return UserViewFactory::createForMe($user);
    }
}