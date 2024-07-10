<?php

declare(strict_types=1);

namespace App\Notifications;

use App\Dto\UserNotificationDto;
use App\Message\EmailMessage;
use App\Message\Message;
use App\Sender\EmailSender;
use App\Sender\NotificationSender;

class NotificationContext
{

    private NotificationFactory $factory;

    public function setStrategy(NotificationFactory $factory): NotificationContext
    {
        $this->factory = $factory;

        return $this;
    }

    public function send(UserNotificationDto $dto): bool
    {
        return $this->factory->getSender()->send($dto, $this->factory->getMessage());
    }
}
