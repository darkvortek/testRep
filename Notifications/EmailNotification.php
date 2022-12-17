<?php

namespace Notifications;

use Dto\EmailDto;
use Dto\UserDto;
use Interfaces\NotificationInterface;

class EmailNotification implements NotificationInterface
{

    protected UserDto $userDto;

    protected string $from;

    protected string $recipient;

    protected string $message;

    public function __construct(EmailDto $emailDto)
    {
        $this->userDto = $emailDto->userDto;
        $this->from = $emailDto->from;
        $this->recipient = $emailDto->recipient;
        $this->message = $emailDto->message;
    }

    public function send(): bool
    {
        /*
         * some code for send email like a
         * mail($this->getFrom(), $this->getRecipient(), $this->getMessage())
         */

        return true;
    }
}