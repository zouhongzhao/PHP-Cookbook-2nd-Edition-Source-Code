<?php
$user = 'Curly';

function sayHello($user, $greeting = 'Hello, %s!') {
  if (!validUser($user)) {
    $greeting = 'Hey! What are you doing here, %s?!';
  }
  printf($greeting, $user);
}

function validUser($user) {
  // do some validation here
  return true;
}

sayHello($user);
?>