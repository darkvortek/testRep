<?php

namespace Test\Messengers;

class PushNotification extends AbstractNotification
{

    public function send(): void
    {
        echo $this->message;
    }
}