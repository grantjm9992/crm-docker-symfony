<?php

namespace App\CoreContext\Domain\ViewModel;

use App\CoreContext\Application\ViewFactory\UserViewFactory;
use App\CoreContext\Domain\Model\User;

class CompanyView
{
    public string $name;
    public string $notificationEmail;
    public UserView $user;

    public function __construct(
        string $name,
        string $notificationEmail,
        User $superUser
    )
    {
        $this->name = $name;
        $this->notificationEmail = $notificationEmail;
        $this->user = UserViewFactory::create($superUser);
    }
}