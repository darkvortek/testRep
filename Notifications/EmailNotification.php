<?php

namespace Notifications;

use Dto\EmailDto;
use Dto\UserDto;
use Interfaces\NotificationInterface;

class EmailNotification implements NotificationInterface
{

    protected EmailDto $emailDto;

    protected string $from;

    protected string $recipient;

    protected string $message;

    public function __construct(EmailDto $emailDto)
    {
        $this->emailDto = $emailDto;
        $this->from = $emailDto->from;
        $this->recipient = $emailDto->recipient;
        $this->message = $emailDto->message;
    }

    public function send(): bool
    {
        /*
         * some code for send email like a
         * mail($this->from, $this->recipient, $this->message)
         */

        return true;
    }
}