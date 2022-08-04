<?php

namespace Hojin\Url\Logger;

use Monolog\Logger as MonoLogger;
use Monolog\Handler\StreamHandler;

class Logger
{
    public function instance() : \Monolog\Logger
    {
        // config
        // $isStream = getenv("IS_STREAM_LOG");
        // $env = getenv("ENV");

        $isStream = false;
        $env = "dev";

        $logLevel = MonoLogger::DEBUG;
        if ("live" == $env) {
            $logLevel = MonoLogger::INFO;
        }

        // Logger init
        $log = new MonoLogger('log');
        $stream = "log/".Date("Ymd").".log";
        if ($isStream) {
            $stream = fopen("php://stdout", "w");
        }
        $log->pushHandler(new StreamHandler($stream, $logLevel));
        return $log;
    }

}