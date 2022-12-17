<?php

namespace Interfaces;

interface NotificationInterface
{
    /**
     * Method for sending notification
     *
     * @return bool
     */
    public function send(): bool;
}