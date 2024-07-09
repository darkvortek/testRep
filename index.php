<?php

define('PROJECT_DIR', __DIR__);

require PROJECT_DIR . '/vendor/autoload.php';

$reader = new App\Readers\JsonReader(new App\Handlers\FileHandler());
$service = new App\Services\SendNotificationsService(new App\Notifications\NotificationStrategy());

$command = new App\Commands\SendUserNotification($reader);
$command->process();