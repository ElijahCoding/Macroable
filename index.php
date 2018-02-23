<?php

use App\Http\Request;

require_once 'vendor/autoload.php';

Request::macro('getMethod', function() {
  return 'works';
});

$request = new Request();

dump($request->getMethod());
