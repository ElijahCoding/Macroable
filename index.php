<?php

use App\Http\Request;
use App\Macros\GetMethod;

require_once 'vendor/autoload.php';

// Request::macro('getMethod', function() {
//   return $this->method;
// });

Request::macro('getMethod', new GetMethod());

$request = new Request();

dump($request->getMethod('a'));
