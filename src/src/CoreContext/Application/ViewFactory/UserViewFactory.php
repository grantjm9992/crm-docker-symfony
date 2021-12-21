<?php

namespace App\CoreContext\Application\ViewFactory;

use App\CoreContext\Domain\Model\User;
use App\CoreContext\Domain\ViewModel\MeView;
use App\CoreContext\Domain\ViewModel\UserView;

class UserViewFactory
{
    public static function create(User $user): UserView
    {
        return new UserView($user);
    }

    public static function createForMe(User $user): MeView
    {
        return new MeView($user);
    }
}