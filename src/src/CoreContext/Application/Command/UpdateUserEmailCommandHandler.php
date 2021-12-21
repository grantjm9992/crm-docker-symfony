<?php

namespace App\CoreContext\Application\Command;

use App\CoreContext\Domain\Model\User;
use App\CoreContext\Domain\Model\UserRepository;

class UpdateUserEmailCommandHandler
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function __invoke(UpdateUserEmailCommand $command): ?User
    {
        $user = $this->userRepository->byId($command->getId());

        $user->updateEmail($command->getEmail());
        $this->userRepository->save($user);

        return $user;
    }
}