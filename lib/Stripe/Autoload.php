<?php
namespace Stripe;

class Autoload
{
  /**
   * Base dir: for absolute paths.
   * @var string
   */
  static $base;

  /**
   * Is the autoloader registered?
   * @var bool
   */
  static $registered = false;

  /**
   * @param string $class
   *
   * @return bool
   */
  public static function load($class)
  {
    if (null === self::$base) {
      self::$base = dirname(__DIR__);
    }
    $file = str_replace('_', '/', $class) . '.php';
    return include sprintf('%s/%s', self::$base, $file);
  }

  /**
   * Register the autoloader.
   *
   * @return void
   */
  public static function register()
  {
    if (true === self::$registered) {
      return;
    }
    spl_autoload_register(array('\Stripe\Autoload', 'load'));
    self::$registered = true;
  }
}
