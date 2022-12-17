<?php

namespace Providers;

final class AppProvider
{
    /**
     * @var AppProvider
     */
    protected static $instance;

    protected array $registered = [];

    private function __construct()
    {
        $this->register();
    }

    public static function getInstance()
    {
        if ( is_null( self::$instance ) ) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    protected function register()
    {
        $this->registered = [
            \Interfaces\LoggerInterface::class => \Loggers\AppLogger::class,
            \Interfaces\ValidatorInterface::class => \Validators\BaseValidator::class,
            \Interfaces\NotificationManagerInterface::class => \Notifications\NotificationManager::class
        ];
    }

    public function get($class)
    {
        if (isset($this->registered[$class])) {
            return new $this->registered[$class];
        }

        throw new \Exception("Class - {$class} is not defined");
    }
}