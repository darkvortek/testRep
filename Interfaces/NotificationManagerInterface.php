<?php

namespace Interfaces;

use Dto\EmailDto;
use Dto\PushDto;

interface NotificationManagerInterface
{
    /**
     * Returns an object of the class that sends email notifications
     *
     * @param EmailDto $dto
     * @return NotificationInterface
     */
    public function toEmail(EmailDto $dto): NotificationInterface;

    /**
     * Returns an object of the class that sends push notifications
     *
     * @param PushDto $dto
     * @return NotificationInterface
     */
    public function toPush(PushDto $dto): NotificationInterface;
}