<?php

namespace Stripe;

class TelemetryId
{
    /** @var null|string */
    private static $cachedId;

    /** @var bool */
    private static $loaded = false;

    /**
     * @return null|string
     */
    public static function get()
    {
        if (self::$loaded) {
            return self::$cachedId;
        }
        self::$loaded = true;

        $configDir = self::getConfigDir();
        if (null === $configDir) {
            return null;
        }

        $filePath = self::joinPath($configDir, 'telemetry_id');

        if (\file_exists($filePath)) {
            $content = @\file_get_contents($filePath);
            if (false !== $content) {
                $content = \trim($content);
                if ('' !== $content) {
                    self::$cachedId = $content;

                    return self::$cachedId;
                }
            }
        }

        self::$cachedId = \bin2hex(\random_bytes(16));

        if (!\is_dir($configDir)) {
            if (!@\mkdir($configDir, 0700, true)) {
                self::$cachedId = null;

                return null;
            }
        }
        if (false === @\file_put_contents($filePath, self::$cachedId)) {
            self::$cachedId = null;

            return null;
        }

        return self::$cachedId;
    }

    /**
     * @return null|string
     */
    public static function getConfigDir()
    {
        if ('\\' === \DIRECTORY_SEPARATOR) {
            $appData = \getenv('APPDATA');
            if (false === $appData || '' === $appData) {
                return null;
            }

            return self::joinPath($appData, 'Stripe');
        }

        $xdg = \getenv('XDG_CONFIG_HOME');
        if (false !== $xdg && '' !== $xdg) {
            return self::joinPath($xdg, 'stripe');
        }

        $home = \getenv('HOME');
        if (false === $home || '' === $home) {
            return null;
        }

        return self::joinPath($home, '.config', 'stripe');
    }

    /**
     * @param string ...$segments
     *
     * @return string
     */
    private static function joinPath(...$segments)
    {
        return \implode(\DIRECTORY_SEPARATOR, $segments);
    }

    /**
     * @internal For testing only
     */
    public static function reset()
    {
        self::$cachedId = null;
        self::$loaded = false;
    }
}
