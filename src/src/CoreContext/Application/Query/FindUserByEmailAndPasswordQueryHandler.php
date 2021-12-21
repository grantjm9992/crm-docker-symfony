<?php

namespace App\CoreContext\Application\Query;

use App\CoreContext\Application\ViewFactory\UserViewFactory;
use App\CoreContext\Domain\Model\UserRepository;
use App\CoreContext\Domain\ViewModel\UserView;
use App\ddd\CQRS\Query\QueryHandler;

class FindUserByEmailAndPasswordQueryHandler implements QueryHandler
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function __invoke(FindUserByEmailAndPasswordQuery $query): UserView
    {
        $user = $this->userRepository->byEmailAndPassword($query->getEmail(), $query->getPassword());

        if ($user === null) {
            throw new \Exception('User not found');
        }

        return UserViewFactory::createForMe($user);
    }
}