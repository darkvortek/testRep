<?php

declare(strict_types=1);

namespace App\Notifications;

use App\Dto\UserNotificationDto;
use App\Message\EmailMessage;
use App\Message\Message;
use App\Sender\EmailSender;
use App\Sender\NotificationSender;

class EmailNotificationFactory implements NotificationFactory
{

    public function getMessage(): Message
    {
        return new EmailMessage();
    }

    public function getSender(): NotificationSender
    {
        return new EmailSender();
    }
}
