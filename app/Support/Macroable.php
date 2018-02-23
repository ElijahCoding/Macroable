<?php

namespace App\Support;

use Closure;

trait Macroable
{
  protected static $macros = [];

  public static function macro($name, $macro)
  {
    static::$macros[$name] = $macro;
  }

  public function __call($method, $parameters)
  {
    $macro = static::$macros[$method];
    
    if ($macro instanceof Closure) {
      return call_user_func_array($macro, $parameters);
    }
  }
}
