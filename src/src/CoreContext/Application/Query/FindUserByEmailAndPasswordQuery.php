<?php

namespace App\CoreContext\Application\Query;

use App\ddd\CQRS\Query\Query;

class FindUserByEmailAndPasswordQuery implements Query
{
    private string $email;
    private string $password;

    public function __construct(string $email, string $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return \md5($this->password);
    }
}