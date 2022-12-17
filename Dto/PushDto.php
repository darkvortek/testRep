<?php

namespace Dto;

class PushDto
{

    public string $from;

    public string $recipient;

    public UserDto $userDto;

    public string $message;

    public function __construct(string $from, string $recipient, UserDto $userDto, string $message) {
        $this->from = $from;
        $this->recipient = $recipient;
        $this->userDto = $userDto;
        $this->message = $message;
    }
}
