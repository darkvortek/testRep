<?php

namespace Dto;

class EmailDto
{
    public string $from;
    public string $recipient;
    public string $message;

    public function __construct(string $from, string $recipient, string $message) {
        $this->from = $from;
        $this->recipient = $recipient;
        $this->message = $message;
    }
}
