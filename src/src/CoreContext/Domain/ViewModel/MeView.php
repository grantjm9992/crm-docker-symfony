<?php

namespace App\CoreContext\Domain\ViewModel;

use App\CoreContext\Domain\Model\User;

class MeView extends UserView
{
    public string $apiToken;

    public function __construct(User $user)
    {
        parent::__construct($user);
        $this->apiToken = $user->getApiToken();
    }
}