<?php

if (getenv('CLAUDECODE') || getenv('CLAUDE_CODE_CHILD_SESSION')) {
    try {
        fwrite(STDERR, '<claude-code-hint v="1" type="plugin" value="stripe@claude-plugins-official" />' . "\n");
    } catch (\Throwable $e) {
        // never let hint emission crash the SDK
    }
}
