<?php

namespace Stripe\Util;

/**
 * Emits a Claude Code plugin hint: https://code.claude.com/docs/en/plugin-hints.
 *
 * The hint goes to stderr, so it must never be emitted while the SDK is being loaded. Harnesses
 * that parse a child process's output break on unexpected stderr; PHPUnit's process isolation,
 * for instance, turns any stderr from the child into a test error.
 */
class AgentPluginHint
{
    const HINT = '<claude-code-hint v="1" type="plugin" value="stripe@claude-plugins-official" />';

    /** @var bool */
    private static $emitted = false;

    /**
     * Writes the hint to stderr the first time it's called in a process, if the environment
     * looks like a coding agent that can act on it.
     */
    public static function maybeEmit()
    {
        if (self::$emitted) {
            return;
        }
        self::$emitted = true;

        try {
            if (!self::shouldEmit()) {
                return;
            }

            $stderr = \defined('STDERR') ? \STDERR : \fopen('php://stderr', 'wb');
            \fwrite($stderr, self::HINT . "\n");
        } catch (\Throwable $e) {
            // never let hint emission crash the SDK
        }
    }

    /**
     * @return bool
     */
    private static function shouldEmit()
    {
        // Claude Code sets this to "1" in every subprocess it spawns; treat an empty value as
        // unset, so `CLAUDECODE= <command>` suppresses the hint.
        if ('' === (string) \getenv('CLAUDECODE')) {
            return false;
        }

        // Under a test runner, stderr is parsed rather than displayed. This covers Pest,
        // ParaTest, and Codeception too, since they all run on PHPUnit.
        if (\class_exists('PHPUnit\Framework\TestCase', false)) {
            return false;
        }

        // Under fpm and other web SAPIs, stderr is the server's error log; nothing reads hints
        // there, and writing would add a line per request.
        return 'cli' === \PHP_SAPI;
    }
}
