<?php

namespace App\CoreContext\Application\Query;

use App\CoreContext\Application\ViewFactory\UserViewFactory;
use App\CoreContext\Domain\Model\UserRepository;
use App\CoreContext\Domain\ViewModel\UserView;
use App\ddd\CQRS\Query\QueryHandler;

class FindUserQueryHandler implements QueryHandler
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function __invoke(FindUserQuery $query): ?UserView
    {
        $user = $this->userRepository->byId($query->getId());
        if ($user === null) {
            throw new \Exception('User not found');
        }

        return UserViewFactory::create($user);
    }
}