<?php

declare(strict_types=1);

namespace App\Handlers;

class FileHandler implements HandlerInterface {

    public function get(): string
    {
        return file_get_contents(PROJECT_DIR . '/usersData.json', true) ?: '';
    }
}
