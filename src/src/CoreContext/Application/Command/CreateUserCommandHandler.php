<?php

namespace App\CoreContext\Application\Command;

use App\CoreContext\Domain\Event\UserCreatedEvent;
use App\CoreContext\Domain\Model\Role;
use App\CoreContext\Domain\Model\RoleRepository;
use App\CoreContext\Domain\Model\User;
use App\CoreContext\Domain\Model\UserRepository;
use App\ddd\CQRS\Command\CommandHandler;
use App\ddd\Domain\Event\EventPublisher;
use Symfony\Component\Config\Definition\Exception\DuplicateKeyException;

class CreateUserCommandHandler implements CommandHandler
{
    private UserRepository $userRepository;
    private CreateCompanyCommandHandler $createCompanyCommandHandler;
    private RoleRepository $roleRepository;

    public function __construct(
        UserRepository $userRepository,
        CreateCompanyCommandHandler $createCompanyCommandHandler,
        RoleRepository $roleRepository
    )
    {
        $this->userRepository = $userRepository;
        $this->createCompanyCommandHandler = $createCompanyCommandHandler;
        $this->roleRepository = $roleRepository;
    }

    public function __invoke(CreateUserCommand $command): User
    {
        $existingUser = $this->userRepository->byEmail($command->getEmail());

        if ($existingUser !== null) {
            throw new DuplicateKeyException($existingUser->getId());
        }

        $user = new User(
            $command->getName(),
            $command->getSurname(),
            $command->getSecondSurname(),
            $command->getEmail(),
            $command->getPassword(),
            $command->getPhone(),
            $command->getMobile(),
            $command->getCompanyName()
        );

        $this->userRepository->save($user);

        // TODO - Move to listener
        $company = $this->createCompanyCommandHandler->__invoke(
            new CreateCompanyCommand(
                $command->getCompanyName(),
                $user->getEmail(),
                null
            )
        );

        $user->setCompany($company);

        $role = $this->roleRepository->byName(Role::ADMIN);

        $user->updateRole($role);

        $this->userRepository->save($user);

        EventPublisher::publishEvent(new UserCreatedEvent($user->getId()), UserCreatedEvent::class);

        return $user;
    }
}