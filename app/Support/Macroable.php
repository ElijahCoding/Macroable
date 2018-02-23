<?php

namespace App\Support;

use Closure;
use ReflectionClass;
use ReflectionMethod;

trait Macroable
{
  protected static $macros = [];

  public static function mixin($mixin)
  {
    $methods = (new ReflectionClass($mixin))->getMethods(
      ReflectionMethod::IS_PUBLIC | ReflectionMethod::IS_PROTECTED
    );

    foreach ($methods as $method) {
      $method->setAccessible(true);
    }

    static::macro($method->name, $method->invoke($mixin));
  }

  public static function macro($name, $macro)
  {
    static::$macros[$name] = $macro;
  }

  public function __call($method, $parameters)
  {
    $macro = static::$macros[$method];

    if ($macro instanceof Closure) {
      return call_user_func_array($macro->bindTo($this, static::class), $parameters);
    }

    return call_user_func_array($macro, $parameters);
  }
}
