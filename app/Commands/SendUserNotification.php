<?php

declare(strict_types=1);

namespace App\Commands;

use App\Dto\NotificationStorageDto;
use App\Dto\UserNotificationDto;
use App\Handlers\FileHandler;
use App\Notifications\EmailNotificationFactory;
use App\Notifications\PushNotificationFactory;
use App\Readers\JsonReader;
use App\Services\SendNotificationsService;
use App\Storage\NotificationsStorage;
use App\Traits\DeviceIdValidation;
use App\Traits\EmailValidation;
use App\Traits\NameValidation;

final readonly class SendUserNotification
{
    use NameValidation;
    use EmailValidation;
    use DeviceIdValidation;

    public function __construct(private NotificationsStorage $storage, private SendNotificationsService $service)
    {
    }

    public function process(): void
    {
        /**
         * Here we are using Reader for get users data from json file but in a real project we would use a DB query builder, an API query, other.
         */
        $reader = new JsonReader(new FileHandler());
        $usersCollection = $reader->getUsersCollection()->get();

        /* @var UserNotificationDto $userDto */
        foreach ($usersCollection as $userDto) {
            if (!$this->validName($userDto->name)) {
                continue;
            }

            if ($this->validEmail($userDto->email)) {
                $this->storage->add($userDto->email, new NotificationStorageDto(
                    new EmailNotificationFactory(),
                    $userDto
                ));
            }

            if ($this->validDeviceId($userDto->deviceId)) {
                $this->storage->add($userDto->deviceId, new NotificationStorageDto(
                    new PushNotificationFactory(),
                    $userDto
                ));
            }
        }

        $this->service->sendNotifications($this->storage);
    }
}