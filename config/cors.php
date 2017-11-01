<?php

return [

  /*
  |--------------------------------------------------------------------------
  | Laravel CORS
  |--------------------------------------------------------------------------
  |
  | allowedOrigins, allowedHeaders and allowedMethods can be set to array('*')
  | to accept any value.
  |
  */

  'supportsCredentials' => false,
  'allowedOrigins' => ['www.test-cors.org'],
  'allowedHeaders' => ['*'],
  'allowedMethods' => ['*'],
  'exposedHeaders' => [],
  'maxAge' => 0,

];
