<?php

declare(strict_types=1);

namespace App\Traits;

trait NameValidation
{

    public function validName(?string $name): bool
    {
        return !empty($name);
    }
}