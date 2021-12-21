<?php

namespace App\CoreContext\Domain\ViewModel;

use DateTime;

class ApplicationView
{
    public string $id;
    public string $key;
    public DateTime $deletedAt;

    public function __construct(
        string $id,
        string $key,
        DateTime $deletedAt
    )
    {
        $this->id = $id;
        $this->key = $key;
        $this->deletedAt = $deletedAt;
    }
}