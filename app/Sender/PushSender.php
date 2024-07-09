<?php

declare(strict_types=1);

namespace App\Sender;

use App\Dto\UserNotificationDto;
use App\Message\Message;

class PushSender implements NotificationSender {

    public function send(UserNotificationDto $dto, Message $message): bool
    {
        echo $message->getMessage($dto);
        return true;
    }
}
