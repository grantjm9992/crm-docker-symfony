<?php

namespace App\CoreContext\Application\ViewFactory;

use App\CoreContext\Domain\Model\Application;
use App\CoreContext\Domain\ViewModel\ApplicationView;
use App\ddd\Application\ViewFactory\AbstractViewFactory;

class ApplicationViewFactory
{
    use AbstractViewFactory;

    public static function create(Application $application): ApplicationView
    {
        return new ApplicationView(
            $application->getId(),
            $application->getKey(),
            $application->getDeletedAt()
        );
    }
}