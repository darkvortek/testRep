<?php

namespace Commands;

use Dto\EmailDto;
use Dto\PushDto;
use Dto\UserDto;
use Interfaces\LoggerInterface;
use Interfaces\NotificationManagerInterface;
use Interfaces\ValidatorInterface;

class SendUserNotification
{

    protected array $alreadySentPush = [];

    protected array $alreadySentEmail = [];

    protected array $usersData;

    protected ValidatorInterface $validator;

    protected LoggerInterface $logger;

    protected NotificationManagerInterface $manager;

    public function __construct(array $usersData)
    {
        $this->usersData = $usersData;
        $this->validator = provider()->get(ValidatorInterface::class);
        $this->logger = provider()->get(LoggerInterface::class);
        $this->manager = provider()->get(NotificationManagerInterface::class);
    }

    public function process(): void
    {
        foreach ($this->usersData as $userData) {
            $name = $userData['name'] ?? '';
            $email = $userData['email'] ?? '';
            $device_id = $userData['device_id'] ?? '';

            $userData = new UserDto($name, $email, $device_id);

            if (empty($userData->name)) {
                continue;
            }

            if ($this->validator->validateDeviceId($userData->device_id) && $this->allowSend($userData->device_id, $this->alreadySentPush)) {
                $this->sendPush($userData);
            }

            if ($this->validator->validateEmail($userData->email) && $this->allowSend($userData->email, $this->alreadySentEmail)) {
                $this->sendEmail($userData);
            }
        }
    }

    protected function sendPush(UserDto $userData): void
    {
        $pushDto = new PushDto(
            'local',
            $userData->device_id,
            get_template('push/UserNotification.phtml')
        );

        if ($this->manager->toPush($pushDto)->send()) {
            $this->logger->write(sprintf(
                "Push notification has been sent to user %s with device_id %s\n\r",
                $userData->name,
                $userData->device_id
            ));

            $this->alreadySentPush[] = $userData->device_id;
        }
    }

    protected function sendEmail(UserDto $userData): void
    {
        $emailDto = new EmailDto(
            'local@local.com',
            $userData->email,
            get_template('email/UserNotification.phtml', ['email' => $userData->email])
        );

        if ($this->manager->toEmail($emailDto)->send()) {
            $this->logger->write(sprintf(
                "Email %s has been sent to user %s\n\r",
                $userData->email,
                $userData->name
            ));

            $this->alreadySentEmail[] = $userData->email;
        }
    }

    protected function allowSend($data, $base): bool
    {
        return !in_array($data, $base);
    }
}