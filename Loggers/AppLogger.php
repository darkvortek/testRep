<?php

namespace Loggers;

use Interfaces\LoggerInterface;

class AppLogger implements LoggerInterface
{

    /**
     * @param $log
     * @return void
     */
    public function write($log): void
    {
        if (!is_string($log)) {
            $log = print_r($log, true);
        }

        echo $log;
    }
}