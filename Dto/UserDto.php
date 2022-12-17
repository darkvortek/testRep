<?php

namespace Dto;

class UserDto
{

    /**
     * @var string|null
     */
    public $name;

    /**
     * @var string|null
     */
    public $email;

    /**
     * @var string|null
     */
    public $device_id;

    public function __construct(string $name, string $email, string $device_id) {
        $this->name = $name;
        $this->email = $email;
        $this->device_id = $device_id;
    }
}
