<?php

declare(strict_types=1);

namespace App\Services;

use App\Dto\UserNotificationDto;
use App\Dto\UsersNotificationCollection;
use App\Notifications\EmailNotificationFactory;
use App\Notifications\NotificationStrategy;
use App\Notifications\PushNotificationFactory;
use App\Traits\DeviceIdValidation;
use App\Traits\EmailValidation;
use App\Traits\NameValidation;
use App\Traits\SentStorage;

final class SendNotificationsService
{
    use NameValidation;
    use EmailValidation;
    use DeviceIdValidation;
    use SentStorage;

    public function __construct(private readonly NotificationStrategy $strategy)
    {
    }

    public function sendNotifications(UsersNotificationCollection $usersCollection): void
    {
        /** @var UserNotificationDto $userDto */
        foreach ($usersCollection->get() as $userDto) {
            if (!$this->validName($userDto->name)) {
                continue;
            }

            if ($this->allowSendEmail($userDto)) {
                $this->strategy->setStrategy(new EmailNotificationFactory());

                if ($this->strategy->send($userDto)) {
                    $this->setSentEmail($userDto->email);
                }
            }

            if ($this->allowSendPush($userDto)) {
                $this->strategy->setStrategy(new PushNotificationFactory());

                if ($this->strategy->send($userDto)) {
                    $this->setSentDeviceId($userDto->deviceId);
                }
            }
        }
    }

    private function allowSendEmail(UserNotificationDto $userDto): bool
    {
        return $this->validEmail($userDto->email) && !$this->isEmailAlreadySent($userDto->email);
    }

    private function allowSendPush(UserNotificationDto $userDto): bool
    {
        return $this->validDeviceId($userDto->deviceId) && !$this->isPushAlreadySent($userDto->deviceId);
    }
}