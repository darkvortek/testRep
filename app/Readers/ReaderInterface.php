<?php

namespace App\Readers;

use App\Dto\UsersNotificationCollection;
use App\Handlers\HandlerInterface;

interface ReaderInterface {

    public function __construct(HandlerInterface $handler);

    public function getUsersCollection(): ?UsersNotificationCollection;
}
