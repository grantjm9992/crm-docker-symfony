<?php

namespace App\CoreContext\Application\Command;

use App\CoreContext\Domain\Model\User;
use App\CoreContext\Domain\Model\UserRepository;
use App\ddd\CQRS\Command\CommandHandler;

class UpdateUserCommandHandler implements CommandHandler
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function __invoke(UpdateUserCommand $command): ?User
    {
        $user = $this->userRepository->byId($command->getId());

        $user->update(
            $command->getName(),
            $command->getSurname(),
            $command->getSurname(),
            $command->getPhone(),
            $command->getMobile()
        );

        $this->userRepository->save($user);

        return $user;
    }
}