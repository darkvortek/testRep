<?php

declare(strict_types=1);

namespace App\Storage;

use App\Dto\NotificationStorageDto;

class NotificationsStorage {

    private array $notifications;

    public function add(string $key, NotificationStorageDto $storageDto): bool
    {
        if (!isset($this->notifications[$key])) {
            $this->notifications[$key] = $storageDto;
            return true;
        }

        return false;
    }

    public function get(): array
    {
        return $this->notifications;
    }
}
