<?php

namespace App\CoreContext\Domain\ViewModel;

use App\CoreContext\Domain\Model\User;

class UserView
{
    public string $id;
    public string $name;
    public string $surname;
    public string $email;

    public function __construct(User $user)
    {
        $this->id = $user->getId();
        $this->name = $user->getName();
        $this->surname = $user->getSurname();
        $this->email = $user->getEmail();
    }
}