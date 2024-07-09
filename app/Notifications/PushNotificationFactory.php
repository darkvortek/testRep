<?php

declare(strict_types=1);

namespace App\Notifications;

use App\Dto\UserNotificationDto;
use App\Message\Message;
use App\Message\PushMessage;
use App\Sender\NotificationSender;
use App\Sender\PushSender;

class PushNotificationFactory implements NotificationFactory
{

    public function getMessage(): Message
    {
        return new PushMessage();
    }

    public function getSender(): NotificationSender
    {
        return new PushSender();
    }
}
