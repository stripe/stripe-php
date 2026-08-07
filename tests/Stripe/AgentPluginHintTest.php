<?php

namespace Stripe;

/**
 * @internal
 *
 * @covers \Stripe\agent_check
 */
final class AgentPluginHintTest extends TestCase
{
    private static $bootstrap;
    private static $hint = '<claude-code-hint v="1" type="plugin" value="stripe@claude-plugins-official" />';

    public static function setUpBeforeClass(): void
    {
        self::$bootstrap = __DIR__ . '/../../init.php';
    }

    /**
     * Runs `php -r 'require bootstrap;'` in a subprocess with a controlled env.
     * Starts from the current process env (minus any Claude vars), then overlays $extra.
     */
    private function runPhpWithEnv(array $extra): array
    {
        $base = \array_diff_key(
            \array_merge(\getenv() ?: [], $_ENV ?: []),
            \array_flip(['CLAUDECODE', 'CLAUDE_CODE_CHILD_SESSION'])
        );
        $env = \array_merge($base, $extra);

        $script = 'require ' . \var_export(self::$bootstrap, true) . ';';
        $cmd = \escapeshellarg(\PHP_BINARY) . ' -r ' . \escapeshellarg($script);

        $proc = \proc_open(
            $cmd,
            [1 => ['pipe', 'w'], 2 => ['pipe', 'w']],
            $pipes,
            null,
            $env
        );

        $stdout = \stream_get_contents($pipes[1]);
        $stderr = \stream_get_contents($pipes[2]);
        \fclose($pipes[1]);
        \fclose($pipes[2]);
        \proc_close($proc);

        return ['stdout' => $stdout, 'stderr' => $stderr];
    }

    public function testEmitsHintWhenClaudecodeSet()
    {
        $out = $this->runPhpWithEnv(['CLAUDECODE' => '1']);
        self::assertStringContainsString(self::$hint, $out['stderr']);
    }

    public function testEmitsHintWhenClaudeCodeChildSessionSet()
    {
        $out = $this->runPhpWithEnv(['CLAUDE_CODE_CHILD_SESSION' => 'session-id']);
        self::assertStringContainsString(self::$hint, $out['stderr']);
    }

    public function testDoesNotEmitHintWhenNoClaudeEnvVarsSet()
    {
        $out = $this->runPhpWithEnv([]);
        self::assertStringNotContainsString(self::$hint, $out['stderr']);
    }

    public function testHintIsOnItsOwnLine()
    {
        $out = $this->runPhpWithEnv(['CLAUDECODE' => '1']);
        $lines = \explode("\n", $out['stderr']);
        self::assertContains(self::$hint, $lines);
    }
}
