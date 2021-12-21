<?php

namespace App\CoreContext\Domain\Model;

interface UserRepository
{
    public function byId(string $id): ?User;

    public function save(User $user): void;

    public function byEmail(string $email): ?User;

    public function byEmailAndPassword(string $email, string $password): ?User;

    public function byApiToken(string $apiToken): ?User;
}