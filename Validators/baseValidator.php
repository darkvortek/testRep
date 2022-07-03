<?php

namespace Test\Validators;

abstract class BaseValidator
{
    public function validateEmail($email) : bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public function validateDeviceId($deviceId) : bool
    {
        return !empty($deviceId);
    }
}