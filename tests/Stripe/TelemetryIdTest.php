<?php

namespace Stripe;

/**
 * @internal
 *
 * @covers \Stripe\TelemetryId
 */
final class TelemetryIdTest extends TestCase
{
    /**
     * @after
     */
    public function resetTelemetryId()
    {
        TelemetryId::reset();
        // Clean up any env vars we set during tests
        \putenv('XDG_CONFIG_HOME');
        \putenv('HOME');
        \putenv('APPDATA');
    }

    public function testGetReturnsHexString()
    {
        $tmpDir = \sys_get_temp_dir() . \DIRECTORY_SEPARATOR . 'stripe_test_' . \bin2hex(\random_bytes(8));
        \putenv('XDG_CONFIG_HOME=' . $tmpDir);

        try {
            $id = TelemetryId::get();
            self::assertNotNull($id);
            self::assertTrue(
                (bool) \preg_match('/^[0-9a-f]{32}$/', $id),
                'Expected telemetry_id to be a 32-char hex string, got: ' . $id
            );
        } finally {
            self::cleanupDir($tmpDir);
        }
    }

    public function testGetReturnsSameValueOnSubsequentCalls()
    {
        $tmpDir = \sys_get_temp_dir() . \DIRECTORY_SEPARATOR . 'stripe_test_' . \bin2hex(\random_bytes(8));
        \putenv('XDG_CONFIG_HOME=' . $tmpDir);

        try {
            $first = TelemetryId::get();
            $second = TelemetryId::get();
            self::assertSame($first, $second, 'Subsequent calls should return the same telemetry_id');
        } finally {
            self::cleanupDir($tmpDir);
        }
    }

    public function testGetReturnsSameValueAfterReset()
    {
        $tmpDir = \sys_get_temp_dir() . \DIRECTORY_SEPARATOR . 'stripe_test_' . \bin2hex(\random_bytes(8));
        \putenv('XDG_CONFIG_HOME=' . $tmpDir);

        try {
            $first = TelemetryId::get();

            // reset in-memory cache but keep the file
            TelemetryId::reset();

            $second = TelemetryId::get();
            self::assertSame($first, $second, 'After reset, should read the same id from disk');
        } finally {
            self::cleanupDir($tmpDir);
        }
    }

    public function testGetReturnsNullWhenNoHomeDir()
    {
        // Remove all config dir env vars so getConfigDir() returns null
        \putenv('XDG_CONFIG_HOME');
        \putenv('HOME');
        // On Windows APPDATA would matter, but on Unix we unset HOME and XDG_CONFIG_HOME
        if ('\\' !== \DIRECTORY_SEPARATOR) {
            $id = TelemetryId::get();
            self::assertNull($id, 'Should return null when no home directory is available');
        } else {
            \putenv('APPDATA');
            $id = TelemetryId::get();
            self::assertNull($id, 'Should return null when APPDATA is not set on Windows');
        }
    }

    public function testResetClearsCache()
    {
        $tmpDir = \sys_get_temp_dir() . \DIRECTORY_SEPARATOR . 'stripe_test_' . \bin2hex(\random_bytes(8));
        \putenv('XDG_CONFIG_HOME=' . $tmpDir);

        try {
            $first = TelemetryId::get();
            TelemetryId::reset();

            // Delete the file so a new id is generated
            $filePath = $tmpDir . \DIRECTORY_SEPARATOR . 'stripe' . \DIRECTORY_SEPARATOR . 'telemetry_id';
            @\unlink($filePath);

            $second = TelemetryId::get();
            self::assertNotSame($first, $second, 'After reset and file deletion, a new id should be generated');
        } finally {
            self::cleanupDir($tmpDir);
        }
    }

    public function testGetConfigDirUsesXdgConfigHome()
    {
        \putenv('XDG_CONFIG_HOME=/custom/xdg');
        $dir = TelemetryId::getConfigDir();
        if ('\\' !== \DIRECTORY_SEPARATOR) {
            self::assertSame('/custom/xdg' . \DIRECTORY_SEPARATOR . 'stripe', $dir);
        }
    }

    public function testGetConfigDirFallsBackToHome()
    {
        \putenv('XDG_CONFIG_HOME');
        \putenv('HOME=/home/testuser');
        if ('\\' !== \DIRECTORY_SEPARATOR) {
            $dir = TelemetryId::getConfigDir();
            self::assertSame('/home/testuser/.config/stripe', $dir);
        }
    }

    public function testGetConfigDirReturnsNullWhenNoHome()
    {
        \putenv('XDG_CONFIG_HOME');
        \putenv('HOME');
        if ('\\' !== \DIRECTORY_SEPARATOR) {
            $dir = TelemetryId::getConfigDir();
            self::assertNull($dir);
        }
    }

    /**
     * Recursively remove a directory.
     *
     * @param string $dir
     */
    private static function cleanupDir($dir)
    {
        if (!\is_dir($dir)) {
            return;
        }
        $files = \scandir($dir);
        foreach ($files as $file) {
            if ('.' === $file || '..' === $file) {
                continue;
            }
            $path = $dir . \DIRECTORY_SEPARATOR . $file;
            if (\is_dir($path)) {
                self::cleanupDir($path);
            } else {
                @\unlink($path);
            }
        }
        @\rmdir($dir);
    }
}
