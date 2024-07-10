<?php

declare(strict_types=1);

namespace App\Dto;

use App\Notifications\NotificationFactory;

final readonly class NotificationStorageDto
{

    public function __construct(
        public NotificationFactory $factory,
        public UserNotificationDto $userDto,
    )
    {
    }
}