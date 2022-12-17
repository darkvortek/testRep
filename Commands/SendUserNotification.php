<?php

namespace Commands;

use Dto\EmailDto;
use Dto\PushDto;
use Dto\UserDto;
use Interfaces\LoggerInterface;
use Interfaces\NotificationManagerInterface;
use Interfaces\ValidatorInterface;
use Notifications\EmailNotification;
use Notifications\PushNotification;
use Repositories\UserRepository;
use Validators\BaseValidator;

class SendUserNotification
{

    protected array $alreadySentPush = [];

    protected array $alreadySentEmail = [];

    protected UserRepository $userRepository;

    protected ValidatorInterface $validator;

    protected LoggerInterface $logger;

    protected NotificationManagerInterface $manager;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
        $this->validator = provider()->get(ValidatorInterface::class);
        $this->logger = provider()->get(LoggerInterface::class);
        $this->manager = provider()->get(NotificationManagerInterface::class);
    }

    public function process(): void
    {
        $users = $this->userRepository->getUsers();

        foreach ($users as $userData) {
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
            $userData,
            get_template('push/UserNotification.phtml')
        );

        if ($this->manager->toPush($pushDto)->send()) {
            $this->logger->write(sprintf(
                "Email %s has been sent to user %s\n\r",
                $userData->email,
                $userData->name
            ));

            $this->alreadySentPush[] = $userData->device_id;
        }
    }

    protected function sendEmail(UserDto $userData): void
    {
        $emailDto = new EmailDto(
            'local@local.com',
            $userData->email,
            $userData,
            get_template('email/UserNotification.phtml', ['email' => $userData->email])
        );

        if ($this->manager->toEmail($emailDto)->send()) {
            $this->logger->write(sprintf(
                "Push notification has been sent to user %s with device_id %s\n\r",
                $userData->name,
                $userData->device_id
            ));

            $this->alreadySentEmail[] = $userData->email;
        }
    }

    protected function allowSend($data, $base): bool
    {
        return !in_array($data, $base);
    }
}