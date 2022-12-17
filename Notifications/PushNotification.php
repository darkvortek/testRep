<?php

namespace Notifications;

use Dto\PushDto;
use Interfaces\NotificationInterface;

class PushNotification implements NotificationInterface
{

    protected PushDto $pushDto;

    protected string $from;

    protected string $recipient;

    protected string $message;

    public function __construct(PushDto $pushDto)
    {
        $this->pushDto = $pushDto;
        $this->from = $pushDto->from;
        $this->recipient = $pushDto->recipient;
        $this->message = $pushDto->message;
    }

    public function send(): bool
    {
        /*
         * some code for send push notification
         */

        return true;
    }
}