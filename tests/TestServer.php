<?php

namespace Stripe;

/**
 * Methods for managing a test HTTP server.
 *
 * The test server works by spawning a new process to run PHP's "php -s" built-in test server.
 *
 * It is probably very easy to leak processes or files using this helper. This was a
 * quick and dirty tool for building confidence in certain HTTP behaviors, but please
 * feel free to delete if this begins to be flaky or cause trouble. Also think carefully
 * before writing new tests that use this helper.
 */
trait TestServer
{
    /** @var mixed */
    protected $serverProc;

    /** @var mixed */
    protected $serverStderr;

    // No significance to this. I picked a random port that seemed close in
    // value to `stripe-mock`'s standard 12111.
    protected $serverPort = 12113;

    private function lint($path)
    {
        $output = '';
        $exitCode = null;
        \exec("php -l {$path}", $output, $exitCode);
        if (0 !== $exitCode) {
            $text = \implode("\n", $output);

            throw new \Exception("Error in test server code: {$text}");
        }
    }

    /**
     * Makes a directory in a temporary path containing only an `index.php` file with
     * the specified content ($code).
     *
     * @param mixed $code
     */
    private function makeTemporaryServerDirectory($code)
    {
        $dir = \sys_get_temp_dir() . \DIRECTORY_SEPARATOR . 'stripe-php-test-server';
        $indexPHP = $dir . \DIRECTORY_SEPARATOR . 'index.php';
        if (\is_file($indexPHP)) {
            \unlink($indexPHP);
        }

        if (\is_dir($dir)) {
            \rmdir($dir);
        }

        \mkdir($dir);
        $handle = \fopen($indexPHP, 'wb');
        \fwrite($handle, $code);
        \fclose($handle);

        $this->lint($indexPHP);

        return $dir;
    }

    public function startTestServer($code)
    {
        if (null !== $this->serverProc) {
            throw new \Exception('Error: test server was already running');
        }

        $dir = $this->makeTemporaryServerDirectory($code);

        $command = 'php -S localhost:' . $this->serverPort . ' -t ' . $dir;
        $pipes = [];
        $this->serverProc = \proc_open(
            $command,
            [2 => ['pipe', 'w']],
            $pipes
        );

        $pid = \proc_get_status($this->serverProc)['pid'];

        $this->serverStderr = $pipes[2];

        if (!\is_resource($this->serverProc)) {
            throw new \Exception("Error starting test server on pid {$pid}, command failed: {$command}");
        }

        while (true) {
            $conn = @\fsockopen('localhost', $this->serverPort);
            if (\is_resource($conn)) {
                \fclose($conn);

                break;
            }
        }

        return 'localhost:' . $this->serverPort;
    }

    /**
     * Dirty way to parse the stderr of `php -S` to see how many
     * requests were sent. Not robust -- and the format of the
     * output changes from PHP version to PHP version, so beware.
     *
     * @param string $s
     */
    private static function isPHPTestServerRequestLogLine($s)
    {
        // Lines start with a left square bracket, and contain
        // a status code in brackets followed by a colon, like [200]:
        // or [404]:
        return \preg_match('/^\[.*\[[0-9]{3}\]:/', $s);
    }

    /**
     * Stops the test server and returns the number of requests
     * as indicated the logs in its stderr.
     */
    public function stopTestServer()
    {
        $n = 0;
        if (!$this->serverProc) {
            return;
        }

        \stream_set_blocking($this->serverStderr, false);
        $lines = \explode(\PHP_EOL, \stream_get_contents($this->serverStderr));
        foreach ($lines as $line) {
            if (self::isPHPTestServerRequestLogLine($line)) {
                ++$n;
            }
        }

        $status = [];
        for ($i = 0; $i < 20; ++$i) {
            $status = \proc_get_status($this->serverProc);
            if (!$status['running']) {
                break;
            }
            $pid = $status['pid'];
            // Kills any child processes -- the php test server
            // appears to start up a child.
            \exec("pkill -P {$pid}");

            // Kill the parent process.
            \exec("kill {$pid}");
            \usleep(10000);
        }

        if ($status['running']) {
            throw new \Exception('Could not kill test server');
        }

        \fclose($this->serverStderr);
        \proc_close($this->serverProc);
        $this->serverProc = null;
        $this->serverStderr = null;

        return $n;
    }
}
