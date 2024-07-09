<?php

declare(strict_types=1);

namespace App\Commands;

use App\Readers\ReaderInterface;
use App\Services\SendNotificationsService;

final readonly class SendUserNotification
{

    public function __construct(private ReaderInterface $reader, private SendNotificationsService $service)
    {
    }

    public function process(): void
    {
        $users = $this->reader->getUsersCollection();

        $this->service->sendNotifications($users);
    }
}