<?php

namespace Interfaces;

interface LoggerInterface
{
    /**
     * @param $log
     * @return void
     */
    public function write($log): void;
}