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

    /**
     * Makes a directory in a temporary path containing only an `index.php` file with
     * the specified content ($code).
     *
     * @param mixed $code
     */
    private function makeTemporaryServerDirectory($code)
    {
        $dir = \sys_get_temp_dir() . \DIRECTORY_SEPARATOR . 'stripe-php-test-server';
        $indexPhp = $dir . \DIRECTORY_SEPARATOR . 'index.php';
        if (\is_file($indexPhp)) {
            \unlink($indexPhp);
        }

        if (\is_dir($dir)) {
            \rmdir($dir);
        }

        \mkdir($dir);
        $handle = \fopen($indexPhp, 'wb');
        \fwrite($handle, $code);
        \fclose($handle);

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

        // echo "Started test server on pid $pid\n";

        $this->serverStderr = $pipes[2];

        if (!\is_resource($this->serverProc)) {
            throw new \Exception("Error starting test server on pid {$pid}, command failed: {$command}");
        }

        while ($r = \fgets($this->serverStderr)) {
            if (\str_contains($r, 'started')) {
                break;
            }
            if (\str_contains($r, 'Failed')) {
                throw new \Exception("Error starting test server on pid {$pid}: " . $r . ' Was the port ' . $this->serverPort . ' already taken?');
            }
        }

        return 'localhost:' . $this->serverPort;
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
            if (\str_contains($line, 'Accepted')) {
                ++$n;
            }
        }
        while (true) {
            $status = \proc_get_status($this->serverProc);
            if (!$status['running']) {
                break;
            }
            $pid = $status['pid'];
            \exec("pkill -P {$pid}");
            \usleep(100000);
        }
        // echo "Terminated test server on pid $pid\n";
        \fclose($this->serverStderr);
        \proc_close($this->serverProc);
        $this->serverProc = null;
        $this->serverStderr = null;

        return $n;
    }
}
