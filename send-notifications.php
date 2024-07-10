<?php

require 'index.php';

$storage = new App\Storage\NotificationsStorage();
$service = new App\Services\SendNotificationsService(new App\Notifications\NotificationContext());

$command = new App\Commands\SendUserNotification($storage, $service);
$command->process();