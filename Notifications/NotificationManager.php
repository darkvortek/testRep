<?php

namespace Notifications;

use Dto\EmailDto;
use Dto\PushDto;
use Interfaces\NotificationInterface;
use Interfaces\NotificationManagerInterface;

class NotificationManager implements NotificationManagerInterface
{

    protected NotificationInterface $messenger;

    public function toEmail(EmailDto $dto): NotificationInterface
    {
        $this->messenger = new EmailNotification($dto);

        return $this->messenger;
    }

    public function toPush(PushDto $dto): NotificationInterface
    {
        $this->messenger = new PushNotification($dto);

        return $this->messenger;
    }
}