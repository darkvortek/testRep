<?php

declare(strict_types=1);

namespace App\Dto;

final class UsersNotificationCollection
{

    private array $users = [];

    public function add(UserNotificationDto $userDto): void
    {
       $this->users[] = $userDto;
    }

    public function get(): array
    {
        return $this->users;
    }
}