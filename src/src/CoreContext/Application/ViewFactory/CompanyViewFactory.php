<?php

namespace App\CoreContext\Application\ViewFactory;

use App\CoreContext\Domain\Model\Company;
use App\CoreContext\Domain\Model\User;
use App\CoreContext\Domain\ViewModel\CompanyView;

class CompanyViewFactory
{
    public static function create(Company $company, User $superUser): CompanyView
    {
        return new CompanyView($company->getName(), $company->getNotificationEmail(), $superUser);
    }
}