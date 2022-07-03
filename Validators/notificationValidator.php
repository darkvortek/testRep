<?php

namespace Test\Validators;

class NotificationValidator extends BaseValidator
{
    protected array $sentEmails = [];

    protected array $sentDevices = [];

    public function validateName($name) : bool
    {
        return !empty($name);
    }

    public function validateEmail($email) : bool
    {
        if (!parent::validateEmail($email)) {
            return false;
        }

        if ($this->checkAlreadySent($this->sentEmails, $email)) {
            return false;
        }

        $this->sentEmails[] = $email;

        return true;
    }

    public function validateDeviceId($deviceId) : bool
    {
        if (!parent::validateDeviceId($deviceId)) {
            return false;
        }

        if ($this->checkAlreadySent($this->sentDevices, $deviceId)) {
            return false;
        }

        $this->sentDevices[] = $deviceId;

        return true;
    }

    public function checkAlreadySent($alreadySent, $data) : bool
    {
        return in_array($data, $alreadySent);
    }
}