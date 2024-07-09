<?php

namespace App\Sender;

use App\Dto\UserNotificationDto;
use App\Message\Message;

interface NotificationSender {

    public function send(UserNotificationDto $dto, Message $message): bool;
}
