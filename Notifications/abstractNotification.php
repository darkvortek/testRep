<?php

namespace Test\Messengers;

use Test\Interfaces\NotificationInterface;

abstract class AbstractNotification implements NotificationInterface
{
    protected string $recipient;

    protected string $message;

    protected array $additional;

    public function setRecipient(string $recipient): NotificationInterface
    {
        $this->recipient = $recipient;

        return $this;
    }

    public function setMessage(string $message): NotificationInterface
    {
        $this->message = $message;

        return $this;
    }

    public function setAdditional(array $additional): NotificationInterface
    {
        $this->additional = $additional;

        return $this;
    }
}