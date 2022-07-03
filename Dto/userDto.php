<?php

namespace Test\Dto;

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

    public static function createFromArray(array $data) : UserDto
    {
        $dto = new self();
        $props = get_class_vars(get_class($dto));

        foreach ($props as $prop => $value) {
            $dto->$prop = $data[$prop] ?? null;
        }

        return $dto;
    }
}
