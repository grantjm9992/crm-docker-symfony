<?php

namespace App\CoreContext\Domain\Model;

interface RoleRepository
{
    public function byId(string $id): ?Role;

    public function save(Role $role): void;

    public function byName(string $name): ?Role;
}