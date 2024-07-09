<?php

namespace App\Message;

use App\Dto\UserNotificationDto;

interface Message {

    public function getMessage(UserNotificationDto $userDto): string;
}
