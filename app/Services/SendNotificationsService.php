<?php

declare(strict_types=1);

namespace App\Services;

use App\Dto\NotificationStorageDto;
use App\Notifications\NotificationContext;
use App\Storage\NotificationsStorage;

final readonly class SendNotificationsService
{
    public function __construct(private NotificationContext $strategy)
    {
    }

    public function sendNotifications(NotificationsStorage $storage): void
    {

        /* @var NotificationStorageDto $storageDto */
        foreach ($storage->get() as $storageDto) {
            $this->strategy->setStrategy($storageDto->factory)->send($storageDto->userDto);
        }
    }
}