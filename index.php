<?php
require_once 'Interfaces/notificationInterface.php';
require_once 'Notifications/notificationManager.php';
require_once 'Notifications/abstractNotification.php';
require_once 'Notifications/emailNotification.php';
require_once 'Notifications/pushNotification.php';
require_once 'Repositories/user.php';
require_once 'Dto/userDto.php';
require_once 'Validators/baseValidator.php';
require_once 'Validators/notificationValidator.php';

use Test\Dto\UserDto;
use Test\Notifications\NotificationManager;
use Test\Repositories\UserRepository;
use Test\Validators\NotificationValidator;

class Newsletter
{
    public function send(): void
    {
        $usersData = $this->getUsers();

        $validator = new NotificationValidator();
        $manager = new NotificationManager();

        foreach ($usersData as $userData) {
            $userData = UserDto::createFromArray($userData);

            if (!$validator->validateName($userData->name)) {
                continue;
            }

            if ($validator->validateDeviceId($userData->device_id)) {
                $manager
                    ->toPush()
                    ->setRecipient($userData->device_id)
                    ->setMessage(
                        sprintf(
                            "Push notification has been sent to user %s with device_id %s\n\r",
                            $userData->name,
                            $userData->device_id
                        ))
                    ->send();
            }

            if ($validator->validateEmail($userData->email)) {
                $manager
                    ->toEmail()
                    ->setRecipient($userData->email)
                    ->setMessage(
                        sprintf(
                            "Email %s has been sent to user %s\n\r",
                            $userData->email,
                            $userData->name
                        ))
                    ->send();
            }
        }
    }

    protected function getUsers() : array
    {
        $userRepository = new UserRepository();
        return $userRepository->getUsers();
    }
}

$newsletter = new Newsletter();
$newsletter->send();
