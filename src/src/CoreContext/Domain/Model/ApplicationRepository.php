<?php

namespace App\CoreContext\Domain\Model;

interface ApplicationRepository
{
    public function save(Application $application): void;

    public function byId(string $id): ?Application;

    public function byKey(string $key): ?Application;
}