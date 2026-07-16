<?php

namespace Stripe;

/**
 * @internal
 *
 * @covers \Stripe\TelemetryId
 */
final class TelemetryIdTest extends TestCase
{
    private static function isWindows()
    {
        return \PHP_OS_FAMILY === 'Windows';
    }

    private static function stripeSubdir()
    {
        return self::isWindows() ? 'Stripe' : 'stripe';
    }

    private function setConfigEnv($path)
    {
        if (self::isWindows()) {
            \putenv('APPDATA=' . $path);
        } else {
            \putenv('XDG_CONFIG_HOME=' . $path);
        }
    }

    /**
     * @after
     */
    public function resetTelemetryId()
    {
        TelemetryId::reset();
        \putenv('XDG_CONFIG_HOME');
        \putenv('HOME');
        \putenv('APPDATA');
    }

    public function testGetReturnsHexString()
    {
        $tmpDir = \sys_get_temp_dir() . \DIRECTORY_SEPARATOR . 'stripe_test_' . \bin2hex(\random_bytes(8));
        $this->setConfigEnv($tmpDir);

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
        $this->setConfigEnv($tmpDir);

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
        $this->setConfigEnv($tmpDir);

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
        \putenv('XDG_CONFIG_HOME');
        \putenv('HOME');
        \putenv('APPDATA');
        $id = TelemetryId::get();
        self::assertNull($id, 'Should return null when no config directory is available');
    }

    public function testResetClearsCache()
    {
        $tmpDir = \sys_get_temp_dir() . \DIRECTORY_SEPARATOR . 'stripe_test_' . \bin2hex(\random_bytes(8));
        $this->setConfigEnv($tmpDir);

        try {
            $first = TelemetryId::get();
            TelemetryId::reset();

            // Delete the file so a new id is generated
            $subdir = self::stripeSubdir();
            $filePath = $tmpDir . \DIRECTORY_SEPARATOR . $subdir . \DIRECTORY_SEPARATOR . 'telemetry_id';
            @\unlink($filePath);

            $second = TelemetryId::get();
            self::assertNotSame($first, $second, 'After reset and file deletion, a new id should be generated');
        } finally {
            self::cleanupDir($tmpDir);
        }
    }

    public function testGetCreatesParentDirectoriesIfMissing()
    {
        $tmpDir = \sys_get_temp_dir() . \DIRECTORY_SEPARATOR . 'stripe_test_' . \bin2hex(\random_bytes(8));
        $nestedDir = $tmpDir . \DIRECTORY_SEPARATOR . 'nested' . \DIRECTORY_SEPARATOR . 'deep';
        $this->setConfigEnv($nestedDir);

        $subdir = self::stripeSubdir();

        try {
            self::assertDirectoryNotExists($nestedDir . \DIRECTORY_SEPARATOR . $subdir);

            $id = TelemetryId::get();

            self::assertNotNull($id);
            self::assertDirectoryExists($nestedDir . \DIRECTORY_SEPARATOR . $subdir);
            self::assertFileExists($nestedDir . \DIRECTORY_SEPARATOR . $subdir . \DIRECTORY_SEPARATOR . 'telemetry_id');
        } finally {
            self::cleanupDir($tmpDir);
        }
    }

    public function testGetConfigDirUsesXdgConfigHome()
    {
        if (self::isWindows()) {
            self::markTestSkipped('XDG is not used on Windows');
        }
        \putenv('XDG_CONFIG_HOME=/custom/xdg');
        $dir = TelemetryId::getConfigDir();
        self::assertSame('/custom/xdg/stripe', $dir);
    }

    public function testGetConfigDirFallsBackToHome()
    {
        if (self::isWindows()) {
            self::markTestSkipped('XDG is not used on Windows');
        }
        \putenv('XDG_CONFIG_HOME');
        \putenv('HOME=/home/testuser');
        $dir = TelemetryId::getConfigDir();
        self::assertSame('/home/testuser/.config/stripe', $dir);
    }

    public function testGetConfigDirReturnsNullWhenNoHome()
    {
        if (self::isWindows()) {
            self::markTestSkipped('XDG is not used on Windows');
        }
        \putenv('XDG_CONFIG_HOME');
        \putenv('HOME');
        $dir = TelemetryId::getConfigDir();
        self::assertNull($dir);
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
