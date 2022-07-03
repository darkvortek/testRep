<?php

namespace Test\Notifications;

use Test\Interfaces\NotificationInterface;
use Test\Messengers\EmailNotification;
use Test\Messengers\PushNotification;

class NotificationManager implements NotificationInterface
{

    protected NotificationInterface $messenger;

    public function __construct()
    {
        $this->messenger = $this->toEmail();
    }

    public function toEmail() : NotificationInterface
    {
        $this->messenger = new EmailNotification();

        return $this->messenger;
    }

    public function toPush() : NotificationInterface
    {
        $this->messenger = new PushNotification();

        return $this->messenger;
    }

    public function setRecipient(string $recipient): NotificationInterface
    {
        return $this->messenger->setRecipient($recipient);
    }

    public function setMessage(string $message): NotificationInterface
    {
        return $this->messenger->setMessage($message);
    }

    public function setAdditional(array $additional): NotificationInterface
    {
        return $this->messenger->setAdditional($additional);
    }

    public function send() : void
    {
        $this->messenger->send();
    }
}