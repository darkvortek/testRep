<?php

declare(strict_types=1);

namespace App\Readers;

use App\Dto\UserNotificationDto;
use App\Dto\UsersNotificationCollection;
use App\Handlers\HandlerInterface;

class JsonReader implements ReaderInterface
{

    public function __construct(private HandlerInterface $handler)
    {
    }

    public function getUsersCollection(): ?UsersNotificationCollection
    {
        $usersData = json_decode($this->handler->get());

        if (empty($usersData)) {
            return null;
        }

        $usersCollection = new UsersNotificationCollection();

        foreach ($usersData as $userData) {
            $usersCollection->add(
                new UserNotificationDto(
                    $userData->name ?? null,
                    $userData->email ?? null,
                    $userData->device_id ?? null,
                )
            );
        }

        return $usersCollection;
    }
}
