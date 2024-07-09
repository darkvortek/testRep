<?php

declare(strict_types=1);

namespace App\Traits;


trait DeviceIdValidation
{

    public function validDeviceId(?string $deviceId): bool
    {
        return !empty($deviceId);
    }
}