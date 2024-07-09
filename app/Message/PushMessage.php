<?php

declare(strict_types=1);

namespace App\Message;

use App\Dto\UserNotificationDto;

class PushMessage implements Message {

    public function getMessage(UserNotificationDto $userDto): string
    {
        return sprintf(
            "Push notification has been sent to user %s with device_id %s \n\r",
            $userDto->name,
            $userDto->deviceId,
        );
    }
}
