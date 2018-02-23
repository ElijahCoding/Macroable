<?php

namespace App\Macros;

class GetMethod
{
  public function getMethod()
  {
    return function() {
      return 'works';
    };
  }
}
