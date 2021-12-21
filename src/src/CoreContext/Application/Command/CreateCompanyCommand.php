<?php

namespace App\CoreContext\Application\Command;

use App\ddd\CQRS\Command\Command;

class CreateCompanyCommand implements Command
{
    private string $name;
    private string $notificationEmail;
    private ?string $token;

    public function __construct(
        string $name,
        string $notificationEmail,
        ?string $token
    )
    {
        $this->name = $name;
        $this->notificationEmail = $notificationEmail;
        $this->token = $token;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getNotificationEmail(): string
    {
        return $this->notificationEmail;
    }

    /**
     * @return string|null
     */
    public function getToken(): ?string
    {
        return $this->token;
    }
}