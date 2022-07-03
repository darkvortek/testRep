<?php

namespace Test\Messengers;

class EmailNotification extends AbstractNotification
{

    public function send(): void
    {
        echo $this->message;
    }
}