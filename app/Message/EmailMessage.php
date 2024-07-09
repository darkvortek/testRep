<?php

declare(strict_types=1);

namespace App\Message;

use App\Dto\UserNotificationDto;

class EmailMessage implements Message {

    public function getMessage(UserNotificationDto $userDto): string
    {
        return sprintf(
            "Email %s has been sent to user %s \n\r",
            $userDto->email,
            $userDto->name,
        );
    }
}
