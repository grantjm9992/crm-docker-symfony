<?php

namespace App\CoreContext\Application\Command;

use App\ddd\CQRS\Command\Command;

class UpdateUserCommand implements Command
{
    private string $id;
    private string $name;
    private string $surname;
    private ?string $secondSurname;
    private string $email;
    private string $password;
    private ?string $phone;
    private ?string $mobile;

    public function __construct(
        string $id,
        string $name,
        string $surname,
        ?string $secondSurname,
        string $email,
        string $password,
        ?string $phone,
        ?string $mobile
    )
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->secondSurname = $secondSurname;
        $this->email = $email;
        $this->password = $password;
        $this->phone = $phone;
        $this->mobile = $mobile;
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getSurname(): string
    {
        return $this->surname;
    }

    /**
     * @return string|null
     */
    public function getSecondSurname(): ?string
    {
        return $this->secondSurname;
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
        return $this->password;
    }

    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @return string|null
     */
    public function getMobile(): ?string
    {
        return $this->mobile;
    }
}