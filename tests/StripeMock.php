<?php

namespace Stripe;

use \Symfony\Component\Process\Process;

class StripeMock
{
    protected static $process = null;
    protected static $port = -1;

    /**
     * Starts a stripe-mock process with custom OpenAPI spec and fixtures files, if they exist.
     *
     * @return bool true if a stripe-mock process was started, false otherwise.
     */
    public static function start()
    {
        if (!file_exists(static::getPathSpec())) {
            return false;
        }

        if (!is_null(static::$process) && static::$process->isRunning()) {
            echo "stripe-mock already running on port " . static::$port . "\n";
            return true;
        }

        static::$port = static::findAvailablePort();

        echo "Starting stripe-mock on port " . static::$port . "...\n";

        static::$process = new Process(join(' ', [
            'stripe-mock',
            '-http-port',
            static::$port,
            '-spec',
            static::getPathSpec(),
            '-fixtures',
            static::getPathFixtures(),
        ]));
        static::$process->start();
        sleep(1);

        if (static::$process->isRunning()) {
            echo "Started stripe-mock, PID = " . static::$process->getPid() . "\n";
        } else {
            die("stripe-mock terminated early, exit code = " . static::$process->wait());
        }

        return true;
    }

    /**
     * Stops the stripe-mock process, if one was started. Otherwise do nothing.
     */
    public static function stop()
    {
        if (is_null(static::$process) || !static::$process->isRunning()) {
            return;
        }

        echo "Stopping stripe-mock...\n";
        static::$process->stop(0, SIGTERM);
        static::$process->wait();
        static::$process = null;
        static::$port = -1;
        echo "Stopped stripe-mock\n";
    }

    /**
     * Returns the port number used by the stripe-mock process.
     *
     * @return int the port number used by stripe-mock, or -1 if no stripe-mock process was started
     */
    public static function getPort()
    {
        return static::$port;
    }

    /**
     * Finds a random available TCP port.
     *
     * @return int the port number
     */
    private static function findAvailablePort()
    {
        $sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        socket_bind($sock, "localhost", 0);
        $addr = null;
        $port = -1;
        socket_getsockname($sock, $addr, $port);
        socket_close($sock);
        return $port;
    }

    /**
     * Returns the path to the custom OpenAPI specification file.
     *
     * @todo Change this to a constant expression once we drop support for PHP < 5.6.
     *
     * @return string the path to the custom OpenAPI specification file
     */
    private static function getPathSpec()
    {
        return  __DIR__ . '/openapi/spec3.json';
    }

    /**
     * Returns the path to the custom OpenAPI fixtures file.
     *
     * @todo Change this to a constant expression once we drop support for PHP < 5.6.
     *
     * @return string the path to the custom OpenAPI fixtures file
     */
    private static function getPathFixtures()
    {
        return  __DIR__ . '/openapi/fixtures3.json';
    }
}
