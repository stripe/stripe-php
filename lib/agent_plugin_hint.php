<?php

if (false !== getenv('CLAUDECODE') || false !== getenv('CLAUDE_CODE_CHILD_SESSION')) {
    try {
        $stderr = \defined('STDERR') ? STDERR : fopen('php://stderr', 'wb');
        fwrite($stderr, '<claude-code-hint v="1" type="plugin" value="stripe@claude-plugins-official" />' . "\n");
    } catch (Throwable $e) {
        // never let hint emission crash the SDK
    }
}
