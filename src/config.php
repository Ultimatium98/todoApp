<?php

return [
  'database' => [
    'name' => 'todo',
    'host' => 'mysql:host=localhost',
    'user' => 'root',
    'password' => '',
    'options' => [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]
  ]
];
 ?>
