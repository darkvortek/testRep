<?php

declare(strict_types=1);

namespace App\Traits;

trait SentStorage
{

    private array $sentEmails = [];

    private array $sendDeviceId = [];

    public function isEmailAlreadySent(?string $email): bool
    {
        return isset($this->sentEmails[$email]);
    }

    public function isPushAlreadySent(?string $deviceId): bool
    {
        return isset($this->sendDeviceId[$deviceId]);
    }

    public function setSentEmail(?string $email)
    {
        $this->sentEmails[$email] = true;
    }

    public function setSentDeviceId(?string $deviceId)
    {
        $this->sendDeviceId[$deviceId] = true;
    }
}