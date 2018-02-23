<?php

namespace App\Macros;

class GetMethod
{
  // public function getMethod()
  // {
  //   return function() {
  //     return 'works';
  //   };
  // }

  public function __invoke($a)
  {
    return $a;
  }
}
