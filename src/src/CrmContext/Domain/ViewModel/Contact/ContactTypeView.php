<?php

namespace App\CrmContext\Domain\ViewModel\Contact;

class ContactTypeView
{
    public string $id;
    public string $companyId;
    public string $name;

    public function __construct(
        string $id,
        string $companyId,
        string $name
    )
    {
        $this->id = $id;
        $this->companyId = $companyId;
        $this->name = $name;
    }
}