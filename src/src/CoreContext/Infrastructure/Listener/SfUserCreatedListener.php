<?php

namespace App\CoreContext\Infrastructure\Listener;

use App\CoreContext\Application\Command\CreateCompanyCommand;
use App\CoreContext\Domain\Event\UserCreatedEvent;
use App\CoreContext\Domain\Model\UserRepository;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Messenger\MessageBusInterface;

class SfUserCreatedListener implements EventSubscriberInterface
{
    private UserRepository $userRepository;
    private MessageBusInterface $messageBus;

    public function __construct(MessageBusInterface $messageBus, UserRepository $userRepository)
    {
        $this->messageBus = $messageBus;
        $this->userRepository = $userRepository;
    }

    public static function getSubscribedEvents(): array
    {
        return [
            UserCreatedEvent::class => 'onUserCreated'
        ];
    }

    public function onUserCreated(UserCreatedEvent $event): void
    {
        $userId = $event->getUserId();

        $user = $this->userRepository->byId($userId);

        if ($user->getCompanyName() === null) {
            return;
        }

        $command = new CreateCompanyCommand(
            $user->getCompanyName(),
            $user->getEmail(),
            null
        );

        $this->messageBus->dispatch($command);
    }


}