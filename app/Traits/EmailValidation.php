<?php

declare(strict_types=1);

namespace App\Traits;

trait EmailValidation
{

    public function validEmail(?string $email): bool
    {
        return (bool) filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}