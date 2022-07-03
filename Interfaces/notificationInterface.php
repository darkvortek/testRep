<?php

namespace Test\Interfaces;

interface NotificationInterface
{

    /**
     * @param string $message
     * @return NotificationInterface
     */
    public function setMessage(string $message) : NotificationInterface;

    /**
     * @param string $recipient
     * @return NotificationInterface
     */
    public function setRecipient(string $recipient) : NotificationInterface;

    /**
     * Set additional data for notifications
     *
     * @param array $additional
     * @return NotificationInterface
     */

    public function setAdditional(array $additional) : NotificationInterface;
    /**
     * Method for sending notification
     */
    public function send() : void;
}