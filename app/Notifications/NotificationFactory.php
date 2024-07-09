<?php

namespace App\Notifications;

use App\Message\Message;
use App\Sender\NotificationSender;

interface NotificationFactory {

    public function getMessage(): Message;

    public function getSender(): NotificationSender;
}
