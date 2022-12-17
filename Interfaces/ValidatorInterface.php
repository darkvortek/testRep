<?php

namespace Interfaces;

interface ValidatorInterface
{

    public function validateEmail($email): bool;

    public function validateDeviceId($deviceId): bool;
}