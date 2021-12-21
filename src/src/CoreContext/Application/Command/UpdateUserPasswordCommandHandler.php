<?php

namespace App\CoreContext\Application\Command;

use App\CoreContext\Domain\Model\User;
use App\CoreContext\Domain\Model\UserRepository;

class UpdateUserPasswordCommandHandler
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function __invoke(UpdateUserPasswordCommand $command): ?User
    {
        $user = $this->userRepository->byId($command->getId());

        $user->updatePassword($command->getPassword());

        $this->userRepository->save($user);
        return $user;
    }
}