<?php

namespace Stripe;

/**
 * @internal
 *
 * @coversNothing
 */
final class AgentPluginHintTest extends TestCase
{
    private static $init;
    private static $composerAutoload;
    private static $hint = '<claude-code-hint v="1" type="plugin" value="stripe@claude-plugins-official" />';
    private static $apiKey = 'sk_test_123';

    public static function setUpBeforeClass(): void
    {
        self::$init = __DIR__ . '/../../init.php';
        self::$composerAutoload = __DIR__ . '/../../vendor/autoload.php';
    }

    /**
     * Runs a PHP snippet in a subprocess with a controlled env. Starts from the current process
     * env (minus CLAUDECODE, which is set whenever the suite itself runs inside Claude Code),
     * then overlays $extra.
     *
     * @param string $script
     */
    private function runPhpWithEnv(array $extra, $script): array
    {
        $base = \array_diff_key(
            \array_merge(\getenv() ?: [], $_ENV ?: []),
            \array_flip(['CLAUDECODE'])
        );
        $env = \array_merge($base, $extra);

        // On Windows, escapeshellarg() replaces double quotes, percent signs, and exclamation
        // marks with spaces, which silently corrupts the snippet. Build scripts out of
        // single-quoted literals only -- var_export() is the easy way to get them.
        self::assertSame(
            0,
            \preg_match('/["%!]/', $script),
            'subprocess scripts must avoid characters that Windows mangles: " % !'
        );

        $cmd = \escapeshellarg(\PHP_BINARY) . ' -r ' . \escapeshellarg($script);

        $proc = \proc_open(
            $cmd,
            [1 => ['pipe', 'w'], 2 => ['pipe', 'w']],
            $pipes,
            null,
            $env
        );

        if (!\is_resource($proc)) {
            self::fail('proc_open failed to start subprocess');
        }

        $stdout = \stream_get_contents($pipes[1]);
        $stderr = \stream_get_contents($pipes[2]);
        \fclose($pipes[1]);
        \fclose($pipes[2]);
        \proc_close($proc);

        return ['stdout' => $stdout, 'stderr' => $stderr];
    }

    /**
     * Loads the SDK in a subprocess without using it.
     *
     * @param null|string $loader
     */
    private function loadSdk(array $extra, $loader = null): array
    {
        $loader = $loader ?: self::$init;

        return $this->runPhpWithEnv($extra, 'require ' . \var_export($loader, true) . ';');
    }

    /**
     * Loads the SDK in a subprocess and constructs $numClients clients.
     *
     * @param int $numClients
     */
    private function constructClients(array $extra, $numClients = 1): array
    {
        $script = 'require ' . \var_export(self::$init, true) . ';'
            . \str_repeat('new \Stripe\StripeClient(' . \var_export(self::$apiKey, true) . ');', $numClients);

        return $this->runPhpWithEnv($extra, $script);
    }

    /**
     * Loads the SDK in a subprocess and sends a request the pre-client way, without ever
     * constructing a client. The request itself is allowed to fail; the hint is emitted while the
     * request is being prepared.
     */
    private function requestWithoutClient(array $extra): array
    {
        $script = 'require ' . \var_export(self::$init, true) . ';'
            . '\Stripe\Stripe::setApiKey(' . \var_export(self::$apiKey, true) . ');'
            . '\Stripe\Stripe::$apiBase = ' . \var_export(MOCK_URL, true) . ';'
            . 'try { \Stripe\Customer::all(); } catch (\Throwable $e) {}';

        return $this->runPhpWithEnv($extra, $script);
    }

    public function testEmitsNothingWhenSdkIsMerelyLoaded()
    {
        $out = $this->loadSdk(['CLAUDECODE' => '1']);
        self::assertSame('', $out['stderr']);
    }

    public function testEmitsNothingWhenComposerAutoloadRuns()
    {
        $out = $this->loadSdk(['CLAUDECODE' => '1'], self::$composerAutoload);
        self::assertSame('', $out['stderr']);
    }

    public function testEmitsHintWhenClaudecodeSet()
    {
        $out = $this->constructClients(['CLAUDECODE' => '1']);
        self::assertStringContainsString(self::$hint, $out['stderr']);
    }

    public function testEmitsHintForRequestsMadeWithoutAClient()
    {
        $out = $this->requestWithoutClient(['CLAUDECODE' => '1']);
        self::assertStringContainsString(self::$hint, $out['stderr']);
    }

    public function testHintIsOnItsOwnLine()
    {
        $out = $this->constructClients(['CLAUDECODE' => '1']);
        $lines = \explode("\n", $out['stderr']);
        self::assertContains(self::$hint, $lines);
    }

    public function testEmitsHintOnlyOncePerProcess()
    {
        $out = $this->constructClients(['CLAUDECODE' => '1'], 3);
        self::assertSame(1, \substr_count($out['stderr'], self::$hint));
    }

    public function testDoesNotEmitHintWhenNoClaudeEnvVarsSet()
    {
        $out = $this->constructClients([]);
        self::assertStringNotContainsString(self::$hint, $out['stderr']);
    }

    public function testDoesNotEmitHintWhenClaudecodeIsEmpty()
    {
        $out = $this->constructClients(['CLAUDECODE' => '']);
        self::assertStringNotContainsString(self::$hint, $out['stderr']);
    }

    /**
     * PHPUnit turns any stderr written by an isolated child into a test error, so a client
     * constructed under process isolation must not emit the hint.
     *
     * There is nothing to assert on: the verification is PHPUnit's own isolation harness, which
     * reads this child's stderr and fails the test if it isn't empty. Constructing the client
     * without erroring *is* the pass condition, so we declare that no assertions are coming
     * rather than padding the test with a truthy one.
     *
     * The env change below only ever lands in the isolated child process, but it's restored
     * anyway: CLAUDECODE also drives the AIAgent user agent (see ApiRequestor::AI_AGENTS), so it
     * must not leak if this test is ever run in-process.
     *
     * @runInSeparateProcess
     */
    public function testDoesNotEmitHintUnderProcessIsolation()
    {
        $this->expectNotToPerformAssertions();
        $original = \getenv('CLAUDECODE');

        try {
            \putenv('CLAUDECODE=1');
            new StripeClient(self::$apiKey);
        } finally {
            false === $original ? \putenv('CLAUDECODE') : \putenv("CLAUDECODE={$original}");
        }
    }
}
